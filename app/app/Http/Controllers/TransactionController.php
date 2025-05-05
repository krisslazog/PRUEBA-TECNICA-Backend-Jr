<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\TransactionService;
use Illuminate\Http\JsonResponse;
class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService=$transactionService;
    }
    public function depositTransaction()
    {
        $deposits=$this->transactionService->depositTransaction();
        return response()->json([
            'message' => 'Depositos encontrados',
            'deposits' => $deposits
        ], 201);
    }
    public function withdrawTransaction()
    {
        $withdraw=$this->transactionService->withdrawTransaction();
        return response()->json([
            'message' => 'Retiros encontrados',
            'withdraw' => $withdraw
        ], 201);
    }
    public function transferTransaction()
    {
        $transfer=$this->transactionService->transferTransaction();
        return response()->json([
            'message' => 'Transferencias encontradas',
            'transfer' => $transfer
        ], 201);
    }
}

