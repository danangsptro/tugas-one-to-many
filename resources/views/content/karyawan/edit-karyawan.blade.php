<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Upload Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>


    <div class="container mt-3">
        <h2>Isi Data Karyawan </h2>
        <hr>
        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_karyawan">Nama Karyawan </label>
                <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan"
                    value="{{ $karyawan->nama_karyawan }}">
                @error('nama_karyawan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="alamat_karyawan">Alamat Karyawan</label>
                <input type="text" class="form-control" id="alamat_karyawan" name="alamat_karyawan"
                    value="{{ $karyawan->alamat_karyawan }}">
                @error('alamat_karyawan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="nomor_telepon">Nomor telepon</label>
                <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon"
                    value="{{ $karyawan->nomor_telepon }}">
                @error('nomor_telepon')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group">
                    <label for="divisi_id">Divisi Karyawan</label>
                    <select name="divisi_id" id="divisi_id" class="custom-select">
                        <option value="">Piih Divisi</option>
                        @foreach ($divisi as $div)
                            <option value="{{ $div->id }}"
                                {{ old('divisi_id') ?? $karyawan->divisi_id == $div->id ? 'selected' : '' }}>
                                {{ $div->nama_divisi }}
                            </option>
                        @endforeach
                    </select>
                    @error('divisi_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="jabatan_id">Jabatan Karyawan</label>
                    <select name="jabatan_id" id="jabatan_id" class="custom-select">
                        <option value="">Piih Karyawan</option>
                        @foreach ($jabatan as $div)
                            <option value="{{ $div->id }}"
                                {{ old('jabatan_id') ?? $karyawan->jabatan_id == $div->id ? 'selected' : '' }}>
                                {{ $div->jabatan_karyawan }}
                            </option>
                        @endforeach
                    </select>
                    @error('jabatan_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status_id">Status Karyawan</label>
                    <select name="status_id" id="status_id" class="custom-select">
                        <option value="">Piih Status</option>
                        @foreach ($status as $div)
                            <option value="{{ $div->id }}"
                                {{ old('status_id') ?? $karyawan->status_id == $div->id ? 'selected' : '' }}>
                                {{ $div->status_karyawan }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_id')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- <div class="form-group">
                    <label for="hobi">Pilih Hobi</label>
                    <select class="js-example-placeholder-multiple js-states form-control" name="hobi[]"
                        multiple="multiple">
                        @foreach ($hobi as $h)
                            <option value="{{ $h->id }}">
                                {{ $h->nama_hobi }}
                            </option>
                        @endforeach
                    </select>
                </div> --}}
            </div>
            <button type="submit" class="btn btn-primary"
                onclick="return confirm('ANDA YAKIN DATA YANG DIISI SUDAH BENAR?')">Upload</button>
            <a href="{{ route('karyawan.index') }}"><button class="btn btn-warning">Back</button></a>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    {{-- @section('js')
        <script>
            $(".js-example-placeholder-multiple").select2().val({
                !!json_encode($karyawan -> hobi() - > allRelatedIds()) !!}).trigger('change');
        </script>
    @endsection  --}}
</body>

</html>
