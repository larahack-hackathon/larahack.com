<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\VoteCategory;
use Illuminate\Http\Request;

class VoteCategoryController extends Controller
{
    public function index()
    {
        return view('admin.vote-categories.index')
            ->with('categories', VoteCategory::all());
    }

    public function create()
    {
        return view('admin.vote-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        VoteCategory::create(['name' => $request->input('name')]);

        return redirect()->route('admin.vote-categories.index')->with('success', 'Vote Category Created');
    }

    public function edit(VoteCategory $category)
    {
        return view('admin.vote-categories.edit')
            ->with('category', $category);
    }

    public function update(Request $request, VoteCategory $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.vote-categories.index')->with('success', 'Vote Category Updated');
    }

    public function destroy(VoteCategory $category)
    {
        try {
            $category->delete();
        } catch (\Throwable $exception) {
            return redirect()->route('admin.vote-categories.index')->with('error', $exception->getMessage());
        }

        return redirect()->route('admin.vote-categories.index')->with('success', 'Vote Category Deleted');
    }
}
