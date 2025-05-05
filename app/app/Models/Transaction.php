<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    public $timestamps = true;

    // Solo usamos created_at, no updated_at
    const UPDATED_AT = null;

    /**Los atributos de la tabla.*/
  protected $fillable = ['type','amount','source_account_id','target_account_id'];
}
