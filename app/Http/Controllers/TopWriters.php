<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Artesaos\SEOTools\Facades\SEOMeta;

class TopWriters extends Controller
{
    public function index() {
        $result = Writer::paginate();
        
        SEOMeta::setTitle("Top Writers")
                 ->setDescription("Check out our writers' ratings, and choose
                 the most suitable writer for your order.");

        return view('top-writers', ['writers' => $result]);
    }
}
