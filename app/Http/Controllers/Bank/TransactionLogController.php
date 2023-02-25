<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bank\TransactionLogBestIn10MinResource;
use App\Repositories\Bank\TransactionLogRepository;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TransactionLogController extends Controller
{
    /**
     * @param TransactionLogRepository $repository
     * @return AnonymousResourceCollection
     */
    public function mostTransactionIn10Minutes(
        TransactionLogRepository $repository
    ):AnonymousResourceCollection
    {
        return TransactionLogBestIn10MinResource::collection(
            $repository->mostTransactionIn10Minutes()
        );
    }
}
