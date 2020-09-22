@extends('master')
@section('content')

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
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
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <h1 class="m-0 text-dark">Halaman Dashboard</h1>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <p class="form-inline my-2 my-lg-0">
                            <a class="dropdown-item" href="{{ route('login') }}"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </p>
                    </div>
                </nav>
                <div class="content-header">
                    <section class="content">
                        <div class="jumbotron jumbotron-fluid">
                            <div class="container">
                                <h1 class="display-4">SELAMAT DATANG DI HALAMAN ADMIN</h1><br>
                                <p class="lead">PT SEMUA SEJAHTERA</p>
                            </div>
                    </section>
                </div>
            </div>
        </div>
    @endsection
