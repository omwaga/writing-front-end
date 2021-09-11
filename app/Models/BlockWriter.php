<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockWriter extends Model
{
    protected $table = 'blocked_writers';

    use HasFactory;
}
