@extends('layouts.master')
@section('title', 'Edit | Data Siswa')
@section('content')
<header>
    <h2 class="mt-3">Edit Data Siswa</h2>
    <hr>
</header>
{{-- Form Data --}}
    @foreach($siswa as $s)
    <form action="{{url('/siswa/update/'.$s->id)}}" method="POST" class="mt-3">
        {{ csrf_field() }}
        <div class="form-group">
        <input type="hidden" name="id" value="{{$s->id}}" id="id">
        <label for="nis">NIS</label>
        <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror"  id="nis" value="{{$s->nis}}" autofocus>
        @error('nis')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{$s->nama}}">
        @error('nama')
            <span class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group">
            <label for="kelas">Kelas</label>
            <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas" value="{{$s->kelas}}">
            @error('kelas')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin"
            value="{{$s->jenis_kelamin}}">
                <option value="">--Pilih Gender--</option>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
            </select>
            @error('jenis_kelamin')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-success">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
            Edit Data
        </button>
    </form>
    @endforeach
@endsection
