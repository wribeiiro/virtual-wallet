<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository
{
    
    public function addCash(Account $account, $value): void
    {
        $account->update([
            'balance' => $account->balance + $value,
        ]);
    }

    public function removeCash(Account $account, $value): void
    {
        $account->update([
            'balance' => $account->balance - $value,
        ]);
    }

    public function checkAccountBalance(Account $account, $value): bool
    {
        return $account->balance >= $value;
    }

    public function checkAccountExists($user_id): bool
    {
        return (bool) Account::where('user_id', $user_id)->first();
    }
}