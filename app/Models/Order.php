<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $primaryKey = 'id';

    protected $table = 'orders';

    use HasFactory;

    public function completedOrder()
    {
        return $this->hasOne(CompletedOrder::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
