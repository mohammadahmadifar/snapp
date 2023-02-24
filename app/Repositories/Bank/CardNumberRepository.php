<?php

namespace App\Repositories\Bank;

use App\Models\CardNumber;
use App\Models\TransactionLog;
use App\Repositories\BaseRepository;
use Illuminate\Database\Query\Builder;

class CardNumberRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return CardNumber::class;
    }

    /**
     * @param $originCard
     * @return CardNumber
     */
    public function getByCardAndLock($originCard): CardNumber
    {
        return $this->model
            ->where('card_number', $originCard)
            ->with('accountNumber')
            ->lockForUpdate()
            ->first();
    }

    /**
     * @param $card
     * @param $price
     * @param $destinationCard
     * @return void
     */
    public function moneyTransfer($card, $price, $destinationCard): void
    {
        $card->accountNumber->update([
            'balance' => $card->accountNumber->balance - $price + config('custom.bank.wage')
        ]);
        $destinationCardInfo = $this->model->where('card_number', $destinationCard)
            ->with('accountNumber')->first();
        $destinationCardInfo->accountNumber
            ->update(['balance' => $destinationCardInfo->accountNumber->balance + $price]);
        TransactionLog::query()->create([
            'origin_card' => $card->card_number,
            'destination_card' => $destinationCard,
            'price' => $price,
            'wage' => config('custom.bank.wage'),
        ]);
    }
}
