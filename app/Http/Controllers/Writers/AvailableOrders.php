<?php

namespace App\Http\Controllers\Writers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AvailableOrders extends Controller
{
    public function index()
    {
        $result = DB::table('orders')
            ->where('bidding', '=', 1)
            ->orderBy('id', 'desc')
            ->paginate(6);
        return view('writer.orders', ['orders' => $result]);
    }
}
