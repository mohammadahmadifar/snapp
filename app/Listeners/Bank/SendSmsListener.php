<?php

namespace App\Listeners\Bank;

use App\Events\Bank\TransactionLogCreateEvent;
use App\Jobs\Sms\SendSmdJob;
use App\Models\CardNumber;
use App\Repositories\Bank\CardNumberRepository;
use Illuminate\Support\Facades\Log;

class SendSmsListener
{
    /**
     * Create the event listener.
     */
    public function __construct(TransactionLogCreateEvent $event)
    {
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $origin_card = CardNumber::query()
            ->where('card_number', $event->transactionLog->origin_card)
            ->with('accountNumber.user')->first();
        $destination_card = CardNumber::query()
            ->where('card_number', $event->transactionLog->destination_card)
            ->with('accountNumber.user')->first();
        SendSmdJob::dispatchAfterResponse(
            $origin_card->accountNumber->user->mobile,
            __('sms.decreasing_from_the_account', [
                'price' => $event->transactionLog->price+$event->transactionLog->wage,
                'balance' => $origin_card->accountNumber->balance,
            ])
        );
        SendSmdJob::dispatchAfterResponse(
            $destination_card->accountNumber->user->mobile,
            __('sms.add_to_account', [
                'price' => $event->transactionLog->price,
                'balance' => $destination_card->accountNumber->balance,
            ])
        );
    }
}
