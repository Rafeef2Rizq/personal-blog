<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $categories=Category::all();
        $articles=Article::where('status','published')->latest()->paginate(3);

        return view('frontend.index',compact('categories','articles'));
    }
   
    public function showArticlesByCategory(Category $category)
    {
        $articles = Article::where('category_id', $category->id)->latest()->paginate(3);

        return view('frontend.index', compact('articles', 'category'));
    }


public function viewAbout(){
    return view('frontend.about');
}



}
