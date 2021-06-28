<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Products extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $stage;
    public $searchTerm;


    public function updatedSearchTerm()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::orderBy('name', 'desc')
            ->when($this->searchTerm, function($q){
                $q->where('name', 'like', '%'.$this->searchTerm.'%');
            })
            ->paginate(13);
        //dd($products);
        return view('livewire.products', [
            'products'=>$products
        ]);
    }
}
