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
            'students' => Student::paginate(5),
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
            'ipk' => 'required|numeric|min:3.5|max:4',
            'ips' => 'required|numeric|min:3.5|max:4',
            'pendapatan_ortu' => 'required|numeric',
            'jumlah_saudara' => 'required|numeric',
            'foto' => 'image|file|max:1024',
        ], [],
        [
            'nim' => 'NIM',
            'alamat' => 'alamat',
            'ipk' => 'IPK',
            'ips' => 'IPS',
            'pendapatan_ortu' => 'pendapatan orang tua',
            'jumlah_saudara' => 'jumlah saudara',
        ]);

        if($request->file('foto')) {
            $file = $request->foto;
            $fileName = uniqid() . '.' . $file->extension();
            $file->move(public_path('photos'), $fileName);
            $validatedData['foto'] = $fileName;
        }

        Student::create($validatedData);

        return redirect('/students')->with('success', 'New student has been added.');
    }

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
            'ipk' => 'required|numeric|min:3.5|max:4',
            'ips' => 'required|numeric|min:3.5|max:4',
            'pendapatan_ortu' => 'required|numeric',
            'jumlah_saudara' => 'required|numeric',
            'foto' => 'image|file|max:1024',
        ], [],
        [
            'nim' => 'NIM',
            'alamat' => 'alamat',
            'ipk' => 'IPK',
            'ips' => 'IPS',
            'pendapatan_ortu' => 'pendapatan orang tua',
            'jumlah_saudara' => 'jumlah saudara',
        ]);

        if($request->file('foto')) {
            if($student->foto !== 'default.jpg') {
                unlink(public_path('photos') . '/' . $student->foto);
            }
            
            $file = $request->foto;
            $fileName = uniqid() . '.' . $file->extension();
            $file->move(public_path('photos'), $fileName);
            $validatedData['foto'] = $fileName;
        }

        Student::where('id', $student->id)->update($validatedData);

        return redirect('/students')->with('success', 'Student has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if($student->foto !== 'default.jpg') {
            unlink(public_path('photos') . '/' . $student->foto);
        }

        Student::destroy($student->id);

        return redirect('/students')->with('success', 'Student has been deleted.');
    }
}
