<?php

namespace App\Http\Controllers;

use App\Models\Attibute;
use App\Http\Requests\StoreAttibuteRequest;
use App\Http\Requests\UpdateAttibuteRequest;

class AttibuteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const PATH_VIEW = 'admin.attibutes.';

    public function index()
    {
        $data = Attibute::all();
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
    public function store(StoreAttibuteRequest $request)
    {
        $data = $request->validated();
        try {
            Attibute::query()->create($data);
            return redirect()
                ->route('attributes.index')
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
    public function show(Attibute $attribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attibute $attribute)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('attribute'));
    }

    public function update(UpdateAttibuteRequest $request, Attibute $attribute)
    {
        $data = $request->validated();
        try {
            $attribute->update($data);

            return redirect()
                ->route('attributes.index')
                ->with('success', 'Attribute updated successfully.');
        } catch (\Throwable $th) {

            return back()
                ->with('error', 'Failed to update attribute: ' . $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attibute $attribute)
    {
        try {
            $attribute->delete();
           
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
