<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model name Category from Jackson
use App\Category;

class CategoryController extends Controller
{
    public function category(){
      return view('categories.category');
    }

    public function addCategory(Request $request){
      // server side Validation
      $this->validate($request, [
        'category' => 'required'
      ]);
      // create an object of category model
      $category = new Category;
      $category->category = $request->input('category');
      $category->save();
      return redirect('/category')->with('response', 'Category Added Successfully');
    }
}
