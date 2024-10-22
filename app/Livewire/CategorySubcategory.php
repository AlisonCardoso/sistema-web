<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class CategorySubcategory extends Component
{
    	
    Use WithPagination;

    public $categories;
    #[Rule('required|min:3')]public $name;
    #[Rule('required')]public $description;
    #[Rule('required')]public $stock;
    #[Rule('required')]public $price;
    #[Rule('required')] public $category;
    #[Rule('required')]
   
    public $subcategory;
    public $subcategories = [];
   
   
    public function mount()
    {
        $this->categories = Category::all();
        $this->subcategories = collect();
    }
    public function updatedCategory($value)
    {
        $this->subcategories = Subcategory::where('category_id', $value)->get();
    }
    public function storeProduct()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'price' => 'required',

            'subcategory' => 'required',
        ]);
        Product::create([
            'name' => $this->name,

            'description' => $this->description,
            'stock' => $this->stock,
            'price' => $this->price,
            'sub_category_id' => $this->subcategory,
        ]);
        session()->flash('success', 'Product created successfully.');
        $this->reset('name', 'description','stock', 'price', 'subcategory', 'category');
    }

    public function render()
    {
        return view('livewire.category-subcategory',[
            'products' => Product::with('subcategory.category')->latest()->paginate(2)
        ]);
    }

   }
