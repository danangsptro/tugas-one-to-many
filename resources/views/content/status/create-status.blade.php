<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>CREATE Status</title>
</head>

<body>
    <div class="container mt-3">
        <h5>Input Data Status</h5>
        <hr>
        <br>
        <form action="{{ route('status.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="status_karyawan"><strong>MASUKAN STATUS KARYAWAN</strong></label>
                <input type="text" name="status_karyawan" class="form-control" id="status_karyawan"
                placeholder="MASUKAN STATUS KARYAWAN">
            </div>
            <button class="btn btn-primary">SIMPAN</button>
        </form>
    </div>
</body>

</html>
