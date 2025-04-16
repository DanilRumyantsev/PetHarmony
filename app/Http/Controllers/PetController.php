<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name_pet' => 'required|string|max:255',
                'color' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'category_id' => 'required|exists:categories,id',
                'image' => 'nullable|image|max:2048',
            ]);
            
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('pets', 'public');
                $validatedData['image'] = $path;
            }

            $pet = new Pet($validatedData);
            $request->user()->pets()->save($pet);
    
            return response()->json($pet, 201);
        } catch (Exception $e) {
            Log::error('Ошибка при создании питомца: ' . $e->getMessage());
            return response()->json(['error' => 'Ошибка сервера'], 500);
        }
    }

    public function index(Request $request)
    {
        return $request->user()->pets;
    }
}
