@extends('layouts.app')

@section('content')

<h4 class="mb-4">Dashboard</h4>

<div class="alert alert-light shadow-sm">
    Selamat datang, <b>{{ Auth::user()->name }}</b> 👋
</div>

<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card bg-primary card-dashboard shadow">
            <div class="card-body">
                <h6>Total Mahasiswa</h6>
                <h2>{{ $totalMahasiswa }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-3">
        <div class="card bg-success card-dashboard shadow">
            <div class="card-body">
                <h6>Total Mata Kuliah</h6>
                <h2>{{ $totalMataKuliah }}</h2>
            </div>
        </div>
    </div>
</div>

@endsection
