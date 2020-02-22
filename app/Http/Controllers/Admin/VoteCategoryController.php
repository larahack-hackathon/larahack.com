<?php

namespace App\Http\Controllers\Admin;

use App\Models\VoteCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VoteCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vote-categories.index')
            ->with('categories', VoteCategory::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vote-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        VoteCategory::create(['name' => $request->input('name')]);

        return redirect()->route('admin.vote-categories.index')->with('success', 'Vote Category Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoteCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(VoteCategory $category)
    {
        return view('admin.vote-categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VoteCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VoteCategory $category)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('admin.vote-categories.index')->with('success', 'Vote Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VoteCategory  $category
     * @return \Illuminate\Http\Response
     */
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
