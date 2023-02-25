<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Http\Resources\Bank\TransactionLogBestIn10MinResource;
use App\Repositories\Bank\TransactionLogRepository;

class TransactionLogController extends Controller
{

    public function mostTransactionIn10Minutes(TransactionLogRepository $repository)
    {
        return TransactionLogBestIn10MinResource::collection(
            $repository->mostTransactionIn10Minutes()
        );
    }
}
