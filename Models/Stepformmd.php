<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StepFormmd extends Model{


    protected $table = 'stepforms_media';
    protected $fillable=[
        'stepform_id', 'target','imageName'
    ];
}