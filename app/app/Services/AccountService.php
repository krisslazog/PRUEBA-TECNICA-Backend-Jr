<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Account;

class AccountService
{
    /**
     * Create a new class instance.
     */


    public function createAccount(array $data): Account
    {
        return Account::create($data);
    }
    public function findAccount($id): Account
    {
        return Account::findOrFail($id);
    }
    public function listAccount(): Collection
    {
        return Account::all();
    }
    public function getBalance($id):float
    {
        $account = Account::findOrFail($id);
        return (float) $account->balance;
    }
}
