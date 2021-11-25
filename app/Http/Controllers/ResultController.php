<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use App\Models\Criteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index() {
        return view('results.index', [
            'results' => Result::all()
        ]);
    }

    public function show($slug) {
        return view('results.show', [
            'results' => Result::where('slug', $slug)->orderBy('skor', 'desc')->paginate(10)
        ]);
    }

    public function calculate(Request $request) {
        $request->validate([
            'label' => 'required|unique:results'
        ], [], [
            'label' => 'label'
        ]);

        // Membuat slug berdasarkan label
        $slug = Str::of($request->label)->slug('-');
        $similarSlug = Result::where('slug', $slug)->get();
        if(count($similarSlug)) $slug = $slug . '-' . uniqid();

        $students = Student::all();
        $criterias = Criteria::all();
        $total_bobot_awal = 0;
        $total_bobot_akhir = 0;

        // Array Alternatif
        foreach ($students as $i => $value) {
            $alternatif[$i] = $value->name;
            $nim[$i] = $value->nim;
        }

        // Array Bobot
        foreach ($criterias as $i => $value) {
            $kriteria[$i] = $value->bobot;
            $jenis_kriteria[$i] = $value->is_beneficial;
        }

        // Total bobot
        foreach ($criterias as $i => $value) {
            $total_bobot_awal += $kriteria[$i];
        }

        // Normalisasi bobot
        foreach ($kriteria as $i => $value) {
            $w_c[$i] = round($kriteria[$i] / $total_bobot_awal, 2);
        }
        
        // Total bobot hasil normalisasi
        foreach ($w_c as $i => $value) {
            $total_bobot_akhir += $w_c[$i];
        }

        // Array untuk nilai dari setiap kriteria
        foreach ($students as $i => $value) {
            if($value->ipk <= 3.6) {
                $c1[$i] = 1;
            }
            if($value->ipk > 3.6 && $value->ipk <= 3.7) {
                $c1[$i] = 3;
            }
            if($value->ipk > 3.7 && $value->ipk <= 3.8) {
                $c1[$i] = 5;
            }
            if($value->ipk > 3.8 && $value->ipk <= 3.9) {
                $c1[$i] = 7;
            }
            if($value->ipk > 3.9) {
                $c1[$i] = 9;
            }
        }
        foreach ($students as $i => $value) {
            if($value->ips <= 3.6) {
                $c2[$i] = 1;
            }
            if($value->ips > 3.6 && $value->ips <= 3.7) {
                $c2[$i] = 3;
            }
            if($value->ips > 3.7 && $value->ips <= 3.8) {
                $c2[$i] = 5;
            }
            if($value->ips > 3.8 && $value->ips <= 3.9) {
                $c2[$i] = 7;
            }
            if($value->ips > 3.9) {
                $c2[$i] = 9;
            }
        }
        foreach ($students as $i => $value) {
            $c3[$i] = $value->pendapatan_ortu;
        }
        foreach ($students as $i => $value) {
            if($value->jumlah_saudara == 0) {
                $c4[$i] = 1;
            }
            if($value->jumlah_saudara == 1 || $value->jumlah_saudara == 2) {
                $c4[$i] = 3;
            }
            if($value->jumlah_saudara == 3 || $value->jumlah_saudara == 4) {
                $c4[$i] = 5;
            }
            if($value->jumlah_saudara == 5 || $value->jumlah_saudara == 6) {
                $c4[$i] = 7;
            }
            if($value->jumlah_saudara > 6) {
                $c4[$i] = 9;
            }
        }
        
        // Menentukan nilai min dan max berdasarkan jenis kriteria
        // dan menentukan matriks normalisasi (R)
        if($jenis_kriteria[0]) {
            $c1_mm = max($c1);
            foreach ($c1 as $i => $value){
                $c1_R[$i] = round($c1[$i] / $c1_mm, 2);
            }
        } else {
            $c1_mm = min($c1);    
            foreach ($c1 as $i => $value){
                $c1_R[$i] = round($c1_mm / $c1[$i], 2);
            }
        }

        if($jenis_kriteria[1]) {
            $c2_mm = max($c2);
            foreach ($c2 as $i => $value){
                $c2_R[$i] = round($c2[$i] / $c2_mm, 2);
            }
        } else {
            $c2_mm = min($c2);
            foreach ($c2 as $i => $value){
                $c2_R[$i] = round($c2_mm / $c2[$i], 2);
            }
        }

        if($jenis_kriteria[2]) {
            $c3_mm = max($c3);
            foreach ($c3 as $i => $value){
                $c3_R[$i] = round($c3[$i] / $c3_mm, 2);
            }
        } else {
            $c3_mm = min($c3);
            foreach ($c3 as $i => $value){
                $c3_R[$i] = round($c3_mm / $c3[$i], 2);
            }
        }

        if($jenis_kriteria[3]) {
            $c4_mm = max($c4);
            foreach ($c4 as $i => $value){
                $c4_R[$i] = round($c4[$i] / $c4_mm, 2);
            }
        } else {
            $c4_mm = min($c4);
            foreach ($c4 as $i => $value){
                $c4_R[$i] = round($c4_mm / $c4[$i], 2);
            }
        }

        // Matriks normalisasi terbobot
        foreach ($c1_R as $i => $value){
            $c1_V[$i] = round(pow($c1_R[$i], $w_c[0]), 2);
        }
        
        foreach ($c2_R as $i => $value){
            $c2_V[$i] = round(pow($c2_R[$i], $w_c[1]), 2);
        }
        
        foreach ($c3_R as $i => $value){
            $c3_V[$i] = round(pow($c3_R[$i], $w_c[2]), 2);
        }
        
        foreach ($c4_R as $i => $value){
            $c4_V[$i] = round(pow($c4_R[$i], $w_c[3]), 2);
        }
        
        // Hitung skor untuk setiap alternatif dengan menggalikan setiap atribut yang diperoleh (M)
        foreach ($alternatif as $i => $value) {
            $performance_score[$i] = round($c1_V[$i] * $c2_V[$i] * $c3_V[$i] * $c4_V[$i], 2);
        }

        // Simpan ke database
        foreach ($students as $i => $value) {
            Result::create([
                'label' => $request->label,
                'slug' => $slug,
                'nim' => $value->nim,
                'nama' => $value->name,
                'skor' => $performance_score[$i]
            ]);
        }

        return redirect('/results/' . $slug);
    }
}
