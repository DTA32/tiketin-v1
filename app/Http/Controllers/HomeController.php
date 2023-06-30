<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\NewsController;

class HomeController extends Controller
{
    public function index(){
        $news = NewsController::getAllNews();
        return view('home', ['news' => $news]);
    }
}
