@extends('layouts.navbar')

@section('main')

<div class="container-fluid mx-auto pt-4">
    <h2 class="text-center">Daftar peserta UJK</h2>
    <div class="row mt-4 d-flex justify-content-center">
        <div class="col-5 mb-3">
            <div class="card p-3">
                <form action="{{ route('ujk.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="floatingInput">Nama</label>
                        <input type="text" class="form-control mb-3" name="nama" id="floatingInput">
                    </div>
                    <div class="form-group mb-3">
                        <label for="floatingInput6">Tahun lahir</label>
                        <input type="number" class="form-control" name="lahir" id="lahir">
                    </div>
                    <div class="form-group mb-3">
                        <label for="floatingInput2">Tinggi Badan ( <i>dalam Meter</i> )</label>
                        <input type="number" step="0.1" class="form-control" name="tinggi" id="floatingInput2 tb">
                    </div>
                    <div class="form-group mb-3">
                        <label for="floatingInput3">Berat Badan ( <i>dalam Kg</i> )</label>
                        <input type="number" class="form-control" name="berat" id="floatingInput3 bb">
                    </div>
                    <div class="form-group mb-3">
                        <label class="mb-2">Hobi</label>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name="hobi1" id="hobi">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="hobi2" id="hobi">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="hobi3" id="hobi">
                            </div>
                        </div>
                    </div>
                    <div class="mx-auto text-center mt-3">
                        <input type="submit" class="btn btn-primary me-2" value="Simpan">
                        <input type="reset" class="btn btn-danger ms-2" value="Reset">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-5 ms-1">
            <div class="card p-3">
                <div class="mb-3">
                    <span class="text-capitalize">Nama : @isset($data)<span id="output1" class="fw-semibold">{{ $data['nama'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span class="text-capitalize">Umur : @isset($data)<span id="output2" class="fw-semibold">{{ $data['umur'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span class="text-capitalize">Tinggi badan : @isset($data)<span id="output3" class="fw-semibold">{{ $data['tinggi'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span class="text-capitalize">Berat badan : @isset($data)<span id="output4" class="fw-semibold">{{ $data['berat'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span class="text-capitalize">Status Berat badan : @isset($data)<span id="output5" class="fw-semibold">{{ $data['obes'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span class="text-capitalize">Hobi : @isset($data)<span id="output6" class="fw-semibold">{{ $data['hobi'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span class="text-capitalize">BMI : @isset($data)<span id="output7" class="fw-semibold">{{ $data['bmi'] }}</span>@endisset</span>
                </div>
                <div class="mb-3">
                    <span class="text-capitalize">Konsultasi : @isset($data)<span id="output8" class="fw-semibold">{{ $data['kons'] }}</span>@endisset</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection