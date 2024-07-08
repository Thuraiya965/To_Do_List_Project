<?php


// app/Models/Todo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'due_date', 'status'];

    public function getStatusAttribute($value)

{

    switch ($value) {

        case 'New':

            return '<span style="color: green;">&#9679;</span> New';

        case 'Active':

            return '<span style="color: blue;">&#9679;</span> Active';

        case 'Completed':

            return '<span style="color: red;">&#9679;</span> Completed';

        default:

            return $value;

    }

}
}
