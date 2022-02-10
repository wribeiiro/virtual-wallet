<?php

namespace App\Services;

use App\Models\Account;
use App\Exceptions\{InsufficientCashException,, ShopkepperMakeTransactionException};
use App\Repositories\{AccountRepository, UserRepository};

class TransactionValidationService
{
    protected $accountRepository;
    protected $userRepository;

    public function __construct(
        AccountRepository $accountRepository, 
        UserRepository $userRepository
    ) {
        $this->accountRepository = $accountRepository;
        $this->userRepository = $userRepository;
    }

    public function validateExecute(array $data): void
    {
        $this->validatePayerIsShopkepper($data['payer_id']);
        $this->validateCheckBalance($data['payer_id'], $data['value']);
    }

    private function validatePayerIsShopkepper($user): void
    {
        if ($this->userRepository->isShopkeeper($user)) {
            throw new ShopkepperMakeTransactionException('Shopkepper is not authorized to make a transactions, only receive', 401);
        }
    }

    private function validateCheckBalance($user, $value): void
    {
        $account  = Account::where('user_id', $user)->first();
        if (!$this->accountRepository->checkAccountBalance($account, $value)) {
            throw new InsufficientCashException('The user dont have money to make the transaction', 422);
        }
    }
}