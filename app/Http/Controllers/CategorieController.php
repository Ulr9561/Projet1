<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::query();
        $sort_by = $request->get('sort_by');
        $sort_direction = $request->get('sort_direction');

        if ($sort_by && $sort_direction) {
            $categories = $categories->orderBy($sort_by, $sort_direction);
        }

        if ($request->has('search')) {
            $categories = $categories->where('name', 'LIKE', '%' . $request->get('search') . '%');
        }

        $categories = $categories->paginate(5);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ])
        ;
        if (Category::where('name', '=', $request->name)->first()) {
            return view('categories.create')->with('success', 'La catégorie existe déjà');
        }
        Category::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Catégorie créée avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('success', 'Catégorie supprimée avec succès');
    }
}
