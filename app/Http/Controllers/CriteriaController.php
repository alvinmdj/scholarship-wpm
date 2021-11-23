<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('criterias.index', [
            'criterias' => Criteria::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criterias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kriteria' => 'required|max:64',
            'bobot' => 'required|numeric|min:1|max:4',
            'is_beneficial' => 'required'
        ], [],
        [
            'nama_kriteria' => 'name',
            'bobot' => 'weight',
            'is_beneficial' => 'type'
        ]);

        Criteria::create($validatedData);

        return redirect('/criterias')->with('success', 'New criteria has been added.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Criteria $criteria)
    {
        return view('criterias.edit', [
            'criteria' => $criteria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criteria $criteria)
    {
        $validatedData = $request->validate([
            'nama_kriteria' => 'required|max:64',
            'bobot' => 'required|numeric|min:1|max:4',
            'is_beneficial' => 'required'
        ], [],
        [
            'nama_kriteria' => 'name',
            'bobot' => 'weight',
            'is_beneficial' => 'type'
        ]);

        Criteria::where('id', $criteria->id)->update($validatedData);

        return redirect('/criterias')->with('success', 'Criteria has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Criteria  $criteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Criteria $criteria)
    {
        Criteria::destroy($criteria->id);

        return redirect('/criterias')->with('success', 'Criteria has been deleted.');
    }
}
