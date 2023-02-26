<?php

namespace App\Repositories\Bank;

use App\Models\CardNumber;
use App\Models\TransactionLog;
use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\Query\Builder;

class TransactionLogRepository extends BaseRepository
{
    /**
     * @return string
     */
    public function model(): string
    {
        return TransactionLog::class;
    }

    /**
     * @return array
     */
    public function mostTransactionIn10Minutes(): array
    {
        $allDatas = $this->model
            ->where('created_at', '>', now()->subMinutes(10))
            ->with('cardNumber.accountNumber.user')
            ->get()
            ->pluck('cardNumber.accountNumber.user.id')
            ->toArray();
        $allUsers = array_count_values($allDatas);
        arsort($allUsers);
        $allUsers = array_flip($allUsers);
        $bestUsers = array_splice($allUsers, 0, 3);
        $bestUsers = array_values($bestUsers);

        $data = array();
        for ($i = 0; $i < count($bestUsers); $i++) {
            $userId = $bestUsers[$i];
            $data[$i] = [
                'user_id' => $userId,
                'data' => TransactionLog::query()
                    ->select('id', 'origin_card', 'destination_card', 'price', 'wage')
                    ->whereHas('cardNumber.accountNumber.user', function ($query) use ($userId) {
                        return $query->where('id', $userId);
                    })
                    ->take(10)
                    ->orderBy('id', 'desc')
                    ->get()
                    ->toArray()
            ];
        }
        return $data;
    }
}
