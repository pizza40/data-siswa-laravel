@extends('layouts.master')
@section('title', 'Data Siswa')
@section('content')
    {{-- header --}}
    <header>
        <h2 class="mt-2">Data Siswa</h2>
        <hr>
    </header>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-success mt-y-2" data-toggle="modal" data-target="#exampleModal">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
        Tambah Data Siswa
    </button>

    {{-- Alert --}}
    @if(session()->has('message'))
        <div class="alert alert-success">
            <strong>{{session()->get('message')}}</strong>
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{-- Detect Current Page --}}
    <h5 class="my-2">Halaman : {{$siswas->currentPage()}}</h5>

    {{-- Search Field --}}
    <label for="search" class="form-label">Cari Data</label>
    <input type="text" class="form-control" id="search" name="search" placeholder="Type to search...">

    {{-- table data --}}
    <table class="table table-hover mt-3">
        <thead>
            <tr class="bg-info">
            <th scope="col" class="text-center">No</th>
            <th scope="col" class="text-center">NIS</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">Kelas</th>
            <th scope="col" class="text-center">Jenis Kelamin</th>
            <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $s)
            <tr>
                {{--
                    Iteration logic
                    current page - 1 * items per pages + loop iteration
                --}}
                <th scope="row" class="text-center">{{($siswas->currentPage()-1) * $siswas->perPage() + $loop->iteration}}</th>
                <td class="text-center">{{$s->nis}}</td>
                <td class="text-center">{{$s->nama}}</td>
                <td class="text-center">{{$s->kelas}}</td>
                <td class="text-center">{{$s->jenis_kelamin}}</td>
                <td class="text-center">
                    <a class="btn btn-outline-primary" href="#">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                        Profile
                    </a>
                    |
                    <a class="btn btn-outline-warning" href="/siswa/edit/{{$s->id}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                        Edit
                    </a>
                    |
                    <a class="btn btn-outline-danger" href="/siswa/delete/{{$s->id}}">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                        </svg>
                        Hapus
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        {{$siswas->links()}}

  {{-- modal tambah data --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              {{-- Form Data --}}
              <form action="/siswa/store" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror"  id="nis" autofocus>
                    @error('nis')
                      <span class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                    @error('nama')
                      <span class="invalid-feedback">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                  <div class="form-group">
                      <label for="kelas">Kelas</label>
                      <input type="text" name="kelas" class="form-control @error('kelas') is-invalid @enderror" id="kelas">
                      @error('kelas')
                          <span class="invalid-feedback">
                              <strong>{{$message}}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="form-group">
                      <label for="jenis_kelamin">Jenis Kelamin</label>
                      <select class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
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
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                      <button type="submit" class="btn btn-primary">Tambah Data</button>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function(){
            fetch_siswa_data();

            function fetch_siswa_data(query = ''){
                $.ajax({
                    url:"{{route('search.siswa')}}",
                    method: 'GET',
                    data: {query:query},
                    dataType:'json',
                    success:function(siswa)
                    {
                        $('tbody').html(siswa.table_data);
                        $('#total_records').text(siswa.total_data);
                    }
                })
            }
            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_siswa_data(query);
            });
        });
    </script>
@endsection
