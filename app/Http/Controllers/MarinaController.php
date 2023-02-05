<?php

namespace App\Http\Controllers;

use App\Models\Island;
use App\Models\Marina;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MarinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'string|required'
        ]);

        $slug = Str::slug($validated['name']);
        $validated['slug'] = $slug;

        if($request->island['slug']) {
            $marina = Island::where('slug', $request->island['slug'])->first()->marinas()->create($validated);
            return redirect(route('admin.islands.show', ['island' => $marina->island->slug]));
        } else {
            return redirect()->back()->with('error', 'Please select an island');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function show(Marina $marina)
    {
        //
        return inertia('Admin/Marinas/show', [
            'marina' => $marina
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function edit(Marina $marina)
    {
        //
    }

    function toggleStatus(Marina $marina){
        if ($marina->is_open == 'Closed') {
            $marina->update(['is_open' => true]);
            return redirect()->back()->with('success', 'Marina is now out of service');
        }
        if ($marina->is_open == 'Open') {
            $marina->update(['is_open' => false]);
            return redirect()->back()->with('success', 'Marina is now in service');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marina $marina)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marina  $marina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marina $marina)
    {
        //
    }

}
