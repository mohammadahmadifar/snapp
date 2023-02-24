<?php

namespace App\Providers;

use App\Events\Bank\TransactionLogCreateEvent;
use App\Listeners\Bank\SendSmsListener;
use App\Models\TransactionLog;
use App\Observers\Bank\TransactionLogObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        TransactionLogCreateEvent::class => [SendSmsListener::class],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        TransactionLog::observe(TransactionLogObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
