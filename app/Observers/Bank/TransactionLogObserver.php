<?php

namespace App\Observers\Bank;

use App\Events\Bank\TransactionLogCreateEvent;
use App\Models\TransactionLog;

class TransactionLogObserver
{
    /**
     * @param TransactionLog $transactionLog
     * @return void
     */
    public function created(TransactionLog $transactionLog): void
    {
        event(new TransactionLogCreateEvent($transactionLog));
    }
}
