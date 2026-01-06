<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Category::with('items')->get();
        // Also get all items if needed for a "all" view or filter
        $items = Item::all();
        return view('menu.index', compact('categories', 'items'));
    }

    public function show(Item $item)
    {
        $relatedItems = Item::where('category_id', $item->category_id)
            ->where('id', '!=', $item->id)
            ->take(4)
            ->get();
            
        return view('menu.show', compact('item', 'relatedItems'));
    }
}
