<?php

namespace App\Http\Controllers;

use App\Models\Island;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class IslandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // show a list of all Islands to the admin
        
        return inertia('Admin/Islands/index', [
            'Islands' => Island::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.islands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required|string',
        ]);

        $slug = Str::slug($validated['name']);
        $validated['slug'] = $slug;
        $newIsland = Island::create($validated);

        return redirect(route('admin.islands.show', ['island' => $newIsland]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Island  $island
     * @return \Illuminate\Http\Response
     */
    public function show(Island $island)
    {
        //
        return inertia('Admin/Islands/show', [
            'island' => $island,
            'marinas' => $island->marinas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Island  $island
     * @return \Illuminate\Http\Response
     */
    public function edit(Island $island)
    {
        //
        return view('admin.islands.edit', ['island' => $island]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Island  $island
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Island $island)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'is_open' => 'required|boolean',
            'description' => 'string|nullable'
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $island->update($validated);

        return redirect(route('admin.islands.show', ['island' => $island->slug]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Island  $island
     * @return \Illuminate\Http\Response
     */
    public function destroy(Island $island)
    {
        //
        $island->marinas()->delete();
        $island->delete();
        return redirect(route('admin.islands'));
    }

    /**
     * Show the form to create a marina with an island already set
     */
    public function createMarina(Island $island)
    {
        return inertia('Admin/Marinas/create', [
            'island_selected' => $island,
        ]);
    }
}
