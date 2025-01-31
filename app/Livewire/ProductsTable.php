<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    public $search = "";


    protected $queryString = ['search'];

    public function  deleteProduct($id)
    {
        // first check if the product exists
        if (Product::find($id)) {
            // if it exists, delete it
            Product::find($id)->delete();
            $this->dispatch('close-product-delete-model');
        }

        // if it doesn't exist, do nothing

        $this->dispatch('close-product-delete-model');
    }

    public function deleteAllProducts()
    {
        // lets delete all products
        Product::truncate(); // this will delete all products
    }

    public function render()
    {
        if ($this->search) {
            $products = Product::where('name', 'like', '%' . $this->search . '%')->paginate(9);
        } else {
            $products = Product::paginate(9);
        }
        return view('livewire.products-table', compact('products'));
    }
}
