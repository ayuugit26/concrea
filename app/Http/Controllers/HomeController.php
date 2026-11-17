<?php
namespace App\Http\Controllers;

use App\Models\{Category, Product, Finish, Project};

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'hero'       => Product::where('is_hero', true)->first(),
            'spotlight'  => Product::where('is_spotlight', true)->first(),
            'categories' => Category::withCount('products')->orderBy('sort_order')->get(),
            'featured'   => Product::where('is_featured', true)->orderBy('featured_order')->get(),
            'finishes'   => Finish::orderBy('sort_order')->get(),
            'projects'   => Project::orderBy('sort_order')->get(),
        ]);
    }
}