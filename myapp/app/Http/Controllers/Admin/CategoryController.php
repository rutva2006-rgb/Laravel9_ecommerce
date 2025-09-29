<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
//dd('Store method working');

class CategoryController extends Controller
{
    public function index()
{
    return view('admin.category.index');
}

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $ValidatedData = $request->validated();

        $category = new Category;
        $category->name = $ValidatedData['name'];
        $category->slug = Str::slug($ValidatedData['slug']);
        $category->description = $ValidatedData['description'];

        $uploadpath = 'uploads/category/';

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $ext;
            $file->move('uploads/category/', $filename);
            $category->image =  $uploadpath.$filename;
        }

        $category->meta_title = $ValidatedData['meta_title'];
        $category->meta_keyword = $ValidatedData['meta_keyword'];   // ✅ FIXED
        $category->meta_description = $ValidatedData['meta_description'];
        $category->status = $request->status == true ? '1' : '0';

        $category->save();

        return redirect('admin/category')->with('message', 'Category Added Successfully.');
    }

   public function edit(Category $category)
    {
        return view('admin.category.edit', ['category' => $category]);

    }
    public function update(CategoryFormRequest $request, Category $category)
{
    $ValidatedData = $request->validated();

    $category->name = $ValidatedData['name'];
    $category->slug = Str::slug($ValidatedData['slug']);
    $category->description = $ValidatedData['description'];

    if ($request->hasFile('image')) {
        $path = 'uploads/category/' . $category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $uploadpath = 'uploads/category/';
        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time() . '_' . uniqid() . '.' . $ext;
        $file->move('uploads/category/', $filename);
        $category->image = $uploadpath.$filename;
    }

    $category->meta_title = $ValidatedData['meta_title'];
    $category->meta_keyword = $ValidatedData['meta_keyword'];
    $category->meta_description = $ValidatedData['meta_description'];
    $category->status = $request->status == true ? '1' : '0';

   $category->update();

    return redirect('admin/category')->with('message', 'Category Updated Successfully.');
}

}
