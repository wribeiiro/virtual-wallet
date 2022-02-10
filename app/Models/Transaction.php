<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Traits\HasUuid;

class Transaction extends Model
{
    use HasFactory, HasUuid;
    
    public $incrementing = false;

    protected $fillable = [
        'id',
        'payer_account_id',
        'payee_account_id',
        'value'
    ];

    public function accountPayee(): belongsTo
    {
        return $this->belongsTo(Account::class,'payee_account_id');
    }

    public function accountPayer(): belongsTo
    {
        return $this->belongsTo(Account::class, 'payer_account_id');
    }
}
