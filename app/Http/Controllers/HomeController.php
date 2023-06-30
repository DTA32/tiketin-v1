<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NewsController;
use App\Models\Bandara;

class HomeController extends Controller
{
    public function index(){
        $news = NewsController::getAllNews();
        $towns = Bandara::select('kota')->distinct()->get();
        return view('home', ['news' => $news, 'towns' => $towns]);
    }
}
