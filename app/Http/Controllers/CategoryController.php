<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use stdClass;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);
        Category::create([
            'name' => $data['name']
        ]);
        return redirect('/categories');
    }

    public function addSub(Request $request)
    {
        $data = $request->validate([
            'category' => 'required',
            'sub' => 'required',
        ]);
        SubCategory::create([
            'cat_id' => $data['category'],
            'sub_id' => $data['sub'],
        ]);
        return redirect('/categories');
    }

    public function show()
    {
        $parents = Category::with('parent','sub')->get();
        $collection = collect($parents->toArray());
        $collection = $collection->values()->keyBy('id');
        $categories = $collection->map(function ($item) {
            $newItem = new stdClass();
            $newItem->name = $item['name'];
            if ($item['parent']) {
                $newItem->parent = $item['parent']['cat_id'];
            } else {
                $newItem->parent = $item['parent'];
            }
            if ($item['sub']) {
                foreach ($item['sub'] as $value) {
                    $newItem->sub[] = $value['sub_id'];
                }
            } else {
                $newItem->sub = null;
            }
            return $this->newItem = $newItem;

        });
        return view('admin.categories.show')->with(['newItem' => $this->newItem, 'categories' => $categories]);
    }

    public function edit($id)
    {
         dd();
    }


}
