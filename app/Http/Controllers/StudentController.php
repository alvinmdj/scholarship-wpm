<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', [
            'students' => Student::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
            'name' => 'required|max:64',
            'nim' => 'required',
            'alamat' => 'required|string',
            'ipk' => 'required|numeric',
            'ips' => 'required|numeric',
            'pendapatan_ortu' => 'required|numeric',
            'jumlah_saudara' => 'required|numeric',
            'biaya_hidup' => 'required|numeric',
        ], [],
        [
            'nim' => 'NIM',
            'alamat' => 'alamat',
            'ipk' => 'IPK',
            'ips' => 'IPS',
            'pendapatan_ortu' => 'pendapatan orang tua',
            'jumlah_saudara' => 'jumlah saudara',
            'biaya_hidup' => 'biaya hidup'
        ]);

        Student::create($validatedData);

        return redirect('/students')->with('success', 'New student has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    // public function show(Student $student)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:64',
            'nim' => 'unique|students',
            'alamat' => 'required|string',
            'ipk' => 'required|numeric',
            'ips' => 'required|numeric',
            'pendapatan_ortu' => 'required|numeric',
            'jumlah_saudara' => 'required|numeric',
            'biaya_hidup' => 'required|numeric',
        ], [],
        [
            'nim' => 'NIM',
            'alamat' => 'alamat',
            'ipk' => 'IPK',
            'ips' => 'IPS',
            'pendapatan_ortu' => 'pendapatan orang tua',
            'jumlah_saudara' => 'jumlah saudara',
            'biaya_hidup' => 'biaya hidup'
        ]);

        Student::where('id', $student->id)->update($validatedData);

        return redirect('/students')->with('success', 'New student has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);

        return redirect('/students')->with('success', 'Student has been deleted.');
    }
}
