@extends('layouts.navbar')

@section('main')
<div class="text-center">
    <h3>Artikel</h3>
</div>
<div class="mb-2">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah</button>
</div>
<table class="table table-hover text-center">
    <thead class="bg-primary text-white">
        <tr>
            <td>Judul</td>
            <td>Penulis</td>
            <td>Tanggal Artikel</td>
            <td>Kategori</td>
            <td>Petugas</td>
            <td>Foto</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d->judul }}</td>
            <td>{{ $d->penulis }}</td>
            <td>{{ $d->tgl_artikel }}</td>
            <td>{{ $d->kategori->kategori }}</td>
            <td><span class="text-capitalize">{{ $d->user->name }}</span></td>
            <td><img src="{{ asset('storage/'.$d->foto) }}" class="rounded-2" width="75px" alt=""></td>
            <td>
                <a href="{{ route('artikel.show', $d->id) }}"><button class="btn btn-secondary">Lihat</button></a>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $d->id }}">Edit</button>
                <form action="{{ route('artikel.destroy', $d->id) }}" method="POST" style="display: inline-block">
                    @csrf
                    @method('delete')
                    <a href="#" onclick="return confirm('Yakin hapus Data ?')"> <button class="btn btn-danger">Delete</button> </a>
                </form>
            </td>
        </tr>
        {{-- Modal edit start --}}
        <div class="modal fade" id="exampleModal{{ $d->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit artikel</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('artikel.update',$d->id) }}" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" value="{{ $d->judul }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Penulis</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="penulis" value="{{ $d->penulis }}">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Isi</label>
                                <textarea name="isi" id="" cols="30" rows="10" class="form-control">{{ $d->isi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Tanggal artikel</label>
                                <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_artikel" value="{{ $d->tgl_artikel }}">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="exampleFormControlInput1" name="foto">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Foto sebelumnya</label>
                                <img src="{{ asset('storage/'.$d->foto) }}" width="75px" class="rounded d-block" alt="">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">kategori</label>
                                <select name="kategori_id" id="" class="form-select">
                                    @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" {{ $k->id == $d->kategori_id? 'selected' : ''}}>{{$k->kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Modal edit end --}}
        @endforeach
    </tbody>
</table>

{{-- modal add --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('artikel.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="penulis">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Isi</label>
                        <textarea name="isi" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Tanggal artikel</label>
                        <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_artikel">
                    </div>
                    <div class="mb-3 d-none">
                        <label for="exampleFormControlTextarea1" class="form-label">Ditambahkan oleh</label>
                        <input type="text" class="form-control text-capitalize" id="exampleFormControlInput1" name="info" value="{{ Auth::user()->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="exampleFormControlInput1" name="foto">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">kategori</label>
                        <select name="kategori_id" id="" class="form-select">
                            @foreach($kategori as $k)
                            <option value="{{ $k->id }}">{{ $k->kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal add --}}
@endsection
