<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepFormdts extends Model{


    protected $table = 'stepforms_details';
    protected $fillable=[
        'stepform_id',
        'list',
        'qty'
    ];
}