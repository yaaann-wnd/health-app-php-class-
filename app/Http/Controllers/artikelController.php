<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class artikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = artikel::all();
        $kategori = kategori::all();

        return view('artikel.tampil', compact('data', 'kategori'));
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
        $request->validate([
            'foto'=>'required|image|max:10000'
        ]);

        $file = $request->file('foto')->store('artikel/foto');

        artikel::create([
            'judul' => $request->judul,
            'foto' => $file,
            'isi' => $request->isi,
            'penulis' => $request->penulis,
            'user_id' => $request->info,
            'tgl_artikel' => $request->tgl_artikel,
            'kategori_id' => $request->kategori_id,
        ]);

        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = artikel::findOrFail($id);

        return view('artikel.detail', compact('data'));
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
        $data = artikel::findOrFail($id);

        $validator = $request->validate([
            'judul'=>'required',
            'penulis'=>'required',
            'isi'=>'required',
            'kategori_id'=>'required',
            'tgl_artikel'=>'required',
        ]);

        $data->update($validator);

        if ($request->file('foto')) {

            $file = $request->file('foto')->store('artikel/foto');

            Storage::delete($data->foto);

            $data->update([
                'foto'=>$file
            ]);
        } else {
            $data->update([
                'foto'=>$data->foto
            ]);

            return redirect('artikel');

        }

        return redirect('artikel');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = artikel::findOrFail($id);

        if ($data->foto) {
            Storage::delete($data->foto);
        }

        $data->delete();

        return redirect('artikel');
    }
}
