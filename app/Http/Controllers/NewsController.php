<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public static function getAllNews(){
        $news = News::all();
        return $news;
    }
    public function get(){
        $news = $this->getAllNews();
        return view('news', ['news' => $news]);
    }
    public function getDetail($id){
        $news = News::find($id);
        return view('news_detail', ['news' => $news]);
    }
}
