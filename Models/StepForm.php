<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepForm extends Model{


    protected $table = 'stepforms';
    protected $fillable=[
        'id','projectname','detail','object','sum','total','startat','endat','tel','email','cate',
        'namebank','numberbank','bank','branch', 'status'
    ];
}
