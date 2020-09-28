@extends('master')
@section('content')

@section('title','STATUS  | Dasboard')
<body>
    <style>
        .table {
            text-align: center;
        }

    </style>
</body>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            </nav>
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <div class="sidebar">
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="/assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                            v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        </div>
                    </div>
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <li class="nav-header">ADMIN</li>
                            <li class="nav-item has-treeview">

                                <a href="#" class="nav-link">
                                    <p>
                                        <i class='fa fa-dashboard'> <strong>Table karyawan</strong></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('divisi.index') }}" class="nav-link">
                                            <p>DIVISI</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('jabatan.index') }}" class="nav-link">
                                            <p>JABATAN</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('karyawan.index') }}" class="nav-link">
                                            <p>KARYAWAN</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('status.index') }}" class="nav-link">
                                            <p>STATUS</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </aside>

            <div class="content-wrapper">
                <section class="content">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container mt-3">
                                <a href="{{ route('status.create') }}"><button class="btn btn-primary">Tambah Data</button></a>
                                <a href="{{ url('admin/dasbord') }}"><button class="btn btn-primary">Back Halaman Admin</button></a>
                                @if (session()->has('validasi'))
                                    <div class="alert alert-success">
                                        {{ session()->get('validasi') }}
                                    </div>
                                @endif
                                @if (Session::has('sukses'))
                                    <div class="alert alert-success">
                                        <p>{{ Session::get('sukses') }}</p>
                                    </div>
                                @endif
                                <br><br>
                                <table  class="table display" id="table_id">
                                    <thead class="thead-dark">
                                        <h3 style="text-align: center">TABLE STATUS KARYAWAN</h3>
                                        <br>
                                        <tr>
                                            <th scope="col">NO</th>
                                            <th scope="col">STATUS KARYAWAN</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td>{{ $d->id }}</td>
                                                <td>{{ $d->status_karyawan }}</td>
                                                <td>
                                                    <form action="{{ route('status.destroy', $d->id) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" onclick="return confirm('ANDA YAKIN INGIN HAPUS ?')">
                                                            HAPUS
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    @endsection
