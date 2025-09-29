<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCount extends Component
{
    public $cartCount = 0;

    protected $listeners = ['CartUpdated' => 'checkCartCount'];

    public function mount()
    {
        $this->checkCartCount();
    }

    public function checkCartCount()
    {
        if (Auth::check()) {
            $this->cartCount = Cart::where('user_id', Auth::id())->count();
        } else {
            $this->cartCount = 0;
        }
    }

    public function render()
    {
        return view('livewire.frontend.cart.cart-count', [
            'cartCount' => $this->cartCount,
        ]);
    }
}
