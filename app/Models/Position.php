<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions'; // Specify the table name if it's different from the model name.

    protected $fillable = ['name', 'description']; // Define the columns that can be filled.

    // You can add relationships, validation rules, or other model-specific logic here.
}
