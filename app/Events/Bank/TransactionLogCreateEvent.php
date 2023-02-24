<?php

namespace App\Events\Bank;

use App\Models\TransactionLog;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TransactionLogCreateEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(TransactionLog $transactionLog)
    {
        $this->transactionLog = $transactionLog;
    }

}
