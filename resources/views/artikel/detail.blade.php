@extends('layouts.navbar')

@section('main')

<div class="content-wrapper">
    <div class="content-wrapper">
        <div class="judul mb-3">
            <h2>{{ $data->judul }}</h2>
        </div>
        <div class="tgl mb-4">
            <span>Tanggal artikel : {{ $data->tgl_artikel }}</span>
        </div>
        <div class="isi">
            <p>{{ $data->isi }}</p>
        </div>
    </div>
</div>
    
@endsection