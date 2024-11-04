<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.categories.';

    public function index()
    {
        //
        $data=Category::all();
        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
        $data = $request->validated();
        try {
            Category::query()->create($data);
            return redirect()
                ->route('categories.index')
                ->with('success', true);
        } catch (\Throwable $th) {
            //throw $th;
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
        $data = $request->validated();
        try {
            $category->update($data);

            return redirect()
                ->route('categories.index')
                ->with('success', 'Category updated successfully.');
        } catch (\Throwable $th) {

            return back()
                ->with('error', 'Failed to update attribute: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        try {
            $category->delete();
           
            return back()
                ->with('success', false);
        } catch (\Throwable $th) {
            //throw $th;
            return back()
                ->with('success', false)
                ->with('error', $th->getMessage());
        }
    }
}
