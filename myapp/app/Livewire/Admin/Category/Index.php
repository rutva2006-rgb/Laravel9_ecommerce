<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;
class Index extends Component
{
     use WithPagination;
      protected $paginationTheme = 'bootstrap';

     public $category_id;
      public function deleteCategory($category_id)
      {
        $this->category_id = $category_id;
      }

      public function destroyCategory()
      {
        $Category = Category::find($this->category_id);
        $path = 'uploads/category/' .$Category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $Category->delete();

            session()->flash('message','Category Deleted');
            $this->dispatch('close-modal');

      }

    public function render()
    {
        $categories = Category::orderby('id','asc')->paginate(10);
        return view('livewire.admin.category.index',['categories' => $categories]);
    }
}
