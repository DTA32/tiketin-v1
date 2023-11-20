<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;


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
    public static function getDetailAsVar($id){
        $news = News::find($id);
        return $news;
    }
    public function getDetail($id){
        $news = $this->getDetailAsVar($id);
        return view('news_detail', ['news' => $news]);
    }
    // ADMIN
    public function getAdmin(){
        $news = $this->getAllNews();
        return view('admin.news', ['news' => $news]);
    }
    public function delete($id){
        $news = News::find($id);
        if(File::exists('images/news/'.$news->id.'.jpg')){
            File::delete('images/news/'.$news->id.'.jpg');
        }
        $news->delete();
        Session::flash('success', 'Berita berhasil dihapus');
        return redirect()->route('admin.news');
    }
    public function add(Request $request){
        $data = $request->validate
        ([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
        ]);
        $newNews = News::create($data);
        $request->file('image')->move('images/news/', $newNews->id.'.jpg');
        Session::flash('success', 'Berita berhasil ditambahkan');
        return redirect()->route('admin.news');
    }
    public function update(Request $request){
        $data = $request->validate
        ([
            'edit_id' => 'required',
            'edit_title' => 'required',
            'edit_content' => 'required',
        ]);
        $news = News::find($data['edit_id']);
        $news->title = $data['edit_title'];
        $news->content = $data['edit_content'];
        $news->save();
        Session::flash('success', 'Berita berhasil diubah');
        return redirect()->route('admin.news');
    }
}
