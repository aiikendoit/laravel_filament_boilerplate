<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    use HasFactory;

    protected $fillable = [
        'regCode',
        'hospNo',
        'firstname',
        'middlename',
        'lastname',
        'suffix',
        'birthdate',
        'address',
        'claimantContactName',
        'claimantContactNo',
        'image',
    ];
}
