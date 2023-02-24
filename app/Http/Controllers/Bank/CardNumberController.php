<?php

namespace App\Http\Controllers\Bank;

use App\Exceptions\InsufficientInventoryException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bank\CardToCardOperationRequest;
use App\Repositories\Bank\CardNumberRepository;
use App\Services\Sms\Ghasedak\SmsGhasedak;
use App\Services\Sms\Kavenegar\SmsKavenegar;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CardNumberController extends Controller
{
    /**
     * @param CardToCardOperationRequest $request
     * @param CardNumberRepository $repository
     * @return JsonResponse
     */
    public function cardToCardOperation(
        CardToCardOperationRequest $request,
        CardNumberRepository       $repository
    ): JsonResponse
    {
        DB::beginTransaction();
        try {
            $card = $repository->getByCardAndLock($request->get('origin_card'));
            if ($card->accountNumber->balance < $request->get('price') + config('custom.bank.wage'))
                throw new InsufficientInventoryException();
            $repository->moneyTransfer(
                $card,
                $request->get('price'),
                $request->get('destination_card')
            );
            DB::commit();
            return response()->json(
                ['massage' => 'The transaction was completed'], ResponseAlias::HTTP_OK
            );
        } catch (\Throwable $t) {
            DB::rollBack();
            return response()->json(
                ['massage' => 'Insufficient inventory'], ResponseAlias::HTTP_BAD_REQUEST
            );
        }
    }

}
