<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    protected $table = 'report';
    protected $fillable =[
        'id', 'problem', 'project_id', 'user_id'
    ];
}