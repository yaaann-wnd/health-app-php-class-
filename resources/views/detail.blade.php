<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIK Health</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-md mb-4 navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">TIK Health</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
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

    <footer class="text-center p-3">
        <div class="mb-1">
            &#169; TIK Health 2022. All rights reserved.
        </div>
        <div>
            Dibuat oleh <span class="fw-semibold">Aftiyan</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>