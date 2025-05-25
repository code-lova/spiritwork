<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data['title'] = 'Property Category Table';
        $data['cat'] = Category::latest()->get();
        return view('admin.category.index', $data);
    }

    public function StoreCategory(CategoryFormRequest $request){
        $validateData = $request->validated();

        $category = new Category;
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['slug']) ;
        $category->description = $validateData['description'];
        $category->status = $request->status == true ? '1':'0';
        $category->save();
        return redirect()->back()->with('message','Category Created Successfully');

    }


    public function EditCategory(CategoryFormRequest $request, $id){
        $validateData = $request->validated();

        $category = Category::findOrFail($id);
        $category->name = $validateData['name'];
        $category->slug = Str::slug($validateData['name']) ;
        $category->description = $validateData['description'];
        $category->status = $request->status == true ? '1':'0';
        $category->update();
        return redirect()->back()->with('message','Category Updated Successfully');
    }


    public function destroyCat($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();
        //$category->products()->delete();
        return redirect()->back()->with('message','Data Deleted Successfully');

    }
}
