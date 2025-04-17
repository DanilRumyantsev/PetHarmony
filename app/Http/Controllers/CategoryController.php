<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name_category' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::create($validatedData);

        return response()->json($category, 201);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if (Category::count() === 0) {
            DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1');
        }
        if (Pet::count() === 0) {
            DB::statement('ALTER TABLE pets AUTO_INCREMENT = 1');
        }

        return response()->json(['message' => 'Category deleted successfully']);
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name_category = $request->name_category;
        $category->description = $request->description;
        $category->save();

        return response()->json($category, 200);
    }
}
