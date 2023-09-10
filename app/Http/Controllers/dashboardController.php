<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
   public function index(){
      
      $uniqueAuthorsCount = User::whereHas('articles')->count();
      $users=USer::latest()->paginate();
//      $uniqueAuthorsCount =  User::count();
      $categoryCount = Category::count();
      $articleCount = Article::count();
      $tagCount = Tag::count();

    return view('dashboard',compact('uniqueAuthorsCount','categoryCount','articleCount','tagCount','users'
   ));
   }
}
