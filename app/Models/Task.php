<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'name',
        'description',
        'deadline',
        'taks_status',
        'user_id',
        'client_id',
        'project_id'
    ];
}
