<?php


// app/Models/Todo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'due_date', 'status'];

    protected $casts = [
        'status' => 'string',
    ];
}