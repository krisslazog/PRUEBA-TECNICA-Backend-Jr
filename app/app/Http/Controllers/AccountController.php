<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Services\AccountService;
use Illuminate\Http\JsonResponse;
class AccountController extends Controller
{
    protected $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService=$accountService;
    }

    public function createAccount(AccountRequest $request)
    {
        $account=$this->accountService->createAccount($request->validated());
        return response()->json([
            'message' => 'Cuenta creada con éxito',
            'account' => $account
        ], 201);
    }
    public function findAccount($id)
    {
        $account=$this->accountService->findAccount($id);
        return response()->json([
            'message' => 'Cuenta encontrada',
            'account' => $account
        ], 201);
    }
    public function listAccount()
    {
        $accounts=$this->accountService->listAccount();
        return response()->json([
            'message' => 'Cuentas encontradas',
            'accounts' => $accounts
        ], 201);

    }
    public function getBalance($id)
    {
        $accounts=$this->accountService->getBalance($id);
        return response()->json([
            'message' => 'Saldo encontrado',
            'accounts' => $accounts
        ], 201);

    }
}

