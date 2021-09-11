<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriterRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class);
    }

}
