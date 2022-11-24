<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ujkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ujk.tampil');
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
        //Menghitung bmi
        $hobi = array($request->hobi1, $request->hobi3, $request->hobi3);
        $a = new konsul($request->berat, $request->tinggi, $request->lahir);
        $data = [
            'nama'=>$request->nama,
            'tinggi'=>$request->tinggi,
            'berat'=>$request->berat,
            'bmi' => round($a->bmi(), 2),
            'obes' => $a->obes(),
            'umur'=>$a->hitungUmur(),
            'kons'=>$a->konsult(),
            'hobi'=>$hobi[0]
        ];

        return view('ujk.tampil', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
}

class umur
{
    public function __construct($berat, $tinggi, $tahunLahir)
    {
        $this->berat = $berat;
        $this->tinggi = $tinggi / 100;
        $this->tahun = $tahunLahir;
    }

    public function bmi()
    {
        return $this->berat / ($this->tinggi * $this->tinggi);
    }

    public function hitungUmur(){
        return 2022 - $this->tahun;
    }
}

class konsul extends umur
{
    public function obes()
    {
        $dbmi = $this->bmi();

        if ($dbmi < 18.5) {
            return 'Kurus';
        } elseif ($dbmi <= 22.9) {
            return 'Normal';
        } elseif ($dbmi <= 29.9) {
            return 'Gemuk';
        } elseif($dbmi > 30) {
            return 'Obesitas';
        } else {
            return 'Harap isi';
        }
    }

    public function konsult(){
        $umur = $this->hitungUmur();
        $status = $this->obes();

        if ($umur >= 17 && $status == 'Obesitas') {
            return 'Anda mendapatkan konsultasi gratis';
        } else {
            return 'Anda tidak mendapatkan konsultasi gratis';
        }
    }
}