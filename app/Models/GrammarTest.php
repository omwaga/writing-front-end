<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammarTest extends Model
{
    use HasFactory;

    protected $table = 'grammar_tests';

    protected $primaryKey = 'id';
}
