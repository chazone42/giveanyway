<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statement extends Model
{
    protected $table = 'statement';
    protected $fillable =[
        'stepforms_id', 'accountNumber', 'sum', 'date', 'type'
    ];
}