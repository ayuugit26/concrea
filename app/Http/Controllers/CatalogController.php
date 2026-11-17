<?php
namespace App\Http\Controllers;

use App\Models\{Category, Product};

class CatalogController extends Controller
{
    public function category(Category $category)
    {
        // Kategori "Custom Design" tidak punya produk, arahkan ke section proyek
        if ($category->is_dark) {
            return redirect(route('home') . '#custom');
        }

        return view('category', [
            'category'   => $category,
            'products'   => $category->products()->orderBy('name')->get(),
            'categories' => Category::orderBy('sort_order')->get(),
        ]);
    }

    public function product(Product $product)
    {
        $product->load('category');

        return view('product', [
            'product' => $product,
            'related' => Product::where('category_id', $product->category_id)
                ->where('id', '!=', $product->id)
                ->limit(3)->get(),
        ]);
    }
}   