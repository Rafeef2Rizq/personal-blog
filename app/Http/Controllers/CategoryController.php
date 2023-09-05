<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(5);

        return view('dashboard.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $imagePath='';
        if($request->hasFile('image')){
            $imageOb=$request->file('image');
            $imagePath=$imageOb->store('uploads','public');
    }
    // dd($request->all());
    Category::create([
        'name'=>$request->name,
        'slug'=>Str::slug($request->name),
        'description'=>$request->description,
        'image'=>$imagePath
    ]);

    return redirect()->route('dashboard.categories.index')->with('success', 'Category created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories=Category::all();

            return view('dashboard.categories.edit',compact('categories','category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        if($request->hasFile('image')){
        $imageOb=$request->file('image');
        $imagePath=$imageOb->store('uploads','public');

        if($category->image){
         Storage::disk('public')->delete($category->image);
        }
        $category->update(
        [
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'description'=>$request->description,
            'image'=>$imagePath 
        ]
        );
        }else{
            $category->update(
                [
                    'name'=>$request->name,
                    'slug'=>Str::slug($request->name),
                    'description'=>$request->description,
                    
                ]
                ); 
        }
        return redirect()->route('dashboard.categories.index')->with('success', 'Category updated !');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $imagePa=$category->image;
       $category->delete();
       if($imagePa && Storage::disk('public')->exists($imagePa)){
           Storage::disk('public')->delete($imagePa);
       }
       return redirect()->route('dashboard.categories.index')->with('success', 'Category Deleted !');

    }
}
