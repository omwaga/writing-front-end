<?php

namespace App\Http\Controllers;

class OrderDetails extends Controller
{
    public function index($orderId)
    {
        return view('user.order.edit', ['orderId' => $orderId]);
    }
}
