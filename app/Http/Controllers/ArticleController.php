<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $articles=Article::latest()->paginate(7);
       return view('dashboard.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $imagePath="";
       if($request->hasFile('image')){
        $imageOb=$request->file('image');
        $imagePath=$imageOb->store('uploads','public');
       }
        
       Article::create([
        'title'=>$request->title,
        'slug'=>Str::slug($request->title),
        'content'=>$request->content,
        'excerpt'=>$request->excerpt,
        'image'=>$imagePath,
        'status'=>$request->status,
        'views'=>$request->views,
        'category_id'=>$request->category_id
       ]);
      
       return to_route('articles.index')->with('success','Atricle Created !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $tags=implode(',',$article->tags()->pluck('name')->toArray());
       
        return view('dashboard.articles.edit',compact('tags'))->with('article',$article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update($request->except('tags'));
        $tags=json_decode($request->post('tags'));
        // dd($tags);
        $saved_tags=Tag::all();
        $tag_ids=[];
        foreach($tags as $tag_name){
          $slug=STR::slug($tag_name->value);
          $tag=$saved_tags->where('slug','=',$slug)->first();
          if(!$tag){
           $tag=Tag::create([
             'name'=>$tag_name->value,
             'slug'=>$slug
           ]);
          }
         $tag_ids[]=$tag->id;
        }
        $article->tags()->sync($tag_ids);
            return redirect()->route('articles.index')->with('success', 'article updated !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $articleImage=$article->image;
        $article->delete();

        if($articleImage &&Storage::disk('public')->exists($articleImage)){
            Storage::disk('public')->delete($articleImage);
        }
        return to_route('articles.index')->with('success','Article Deleted !');
    }

    
}
