<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category, $priceInput;
    public $brandInputs = [];

    protected $queryString = [
        'brandInputs' => ['except' => '','as' => 'brand'],
        'priceInput' => ['except' => '','as' => 'brand'],

    ];

    public function mount($category)
    {
        $this->category = $category;

    }
    public function render()
    {

        $this->products = Product::where('category_id',$this->category->id)
                               ->when(is_array($this->brandInputs) && count($this->brandInputs), function($q) {
                                        $q->whereIn('brand', $this->brandInputs);
                                 })
                                ->when($this->priceInput, function($q){

                                    $q->when($this->priceInput == 'high-to-low',function($q2){
                                        $q2->orderBy('selling_price','desc');
                                    })
                                    ->when($this->priceInput == 'low-to-high',function($q2){
                                        $q2->orderBy('selling_price','asc');
                                    });

                                })

                                ->where('status','0')
                                ->get();


        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category,

        ]);
    }
}
