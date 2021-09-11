<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TopWriters extends Controller
{
    public function index() {
        $result = Writer::paginate();

        return view('top-writers', ['writers' => $result]);
    }
}
