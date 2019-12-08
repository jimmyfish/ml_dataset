<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    protected $fillable = [
        'customer_id',
        'surname',
        'credit_score',
        'geography',
        'gender',
        'gender_numeric',
        'age',
        'tenure',
        'balance',
        'num_of_product',
        'has_cr_card',
        'is_active_member',
        'estimated_salary',
        'exited',
    ];
}
