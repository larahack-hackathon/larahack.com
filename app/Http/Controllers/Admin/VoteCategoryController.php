<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoteCategoryRequest;
use App\Models\VoteCategory;
use Illuminate\Http\Request;

class VoteCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.vote-categories.index')->with('categories', VoteCategory::all());
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
     * @param  \App\Http\Requests\VoteCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VoteCategoryRequest $request)
    {
        VoteCategory::create($request->validated());

        return redirect()->route('admin.vote-categories.index')->with('success', 'Vote Category Created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VoteCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(VoteCategory $voteCategory)
    {
        return view('admin.vote-categories.edit')->with('category', $voteCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\VoteCategoryRequest  $request
     * @param  \App\Models\VoteCategory  $category
     * @return \Illuminate\Http\Response
     */
    public function update(VoteCategoryRequest $request, VoteCategory $voteCategory)
    {
        $category->update($request->validated());
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
