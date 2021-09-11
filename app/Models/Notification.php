<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['notification', 'user_id', 'seen', 'for'];

    public function intended(){
        return $this->belongsTo(Writer::class, 'for');
    }

}
