<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $fillable =[
        'prefix','firstname','lastname','company','idcard','housenum','road','district','country','province',
'postalcode','tel','idcardimg'
    ];
}
