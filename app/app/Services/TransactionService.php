<?php

namespace App\Services;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Transaction;

class TransactionService
{
    /**
     * Create a new class instance.
     */

    public function depositTransaction():collection
    {
        $deposits = Transaction::
        where('type','Deposito')
        ->get();
        return $deposits;
    }
    public function withdrawTransaction():collection
    {
        $withdraw = Transaction::
        where('type','Retiro')
        ->get();
        return $withdraw;
    }
    public function transferTransaction():collection
    {
        $transfer = Transaction::
        where('type','Tranferencia')
        ->get();
        return $transfer;
    }


}
