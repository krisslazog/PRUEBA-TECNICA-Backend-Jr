<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';


    public $timestamps = true;

    // Solo usamos created_at, no updated_at
    const UPDATED_AT = null;

    /**Los atributos de la tabla.*/
  protected $fillable = ['holder_name','document_number','account_type','balance',];
}
