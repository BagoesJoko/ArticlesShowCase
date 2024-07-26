@extends('back.layout.template')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap.css">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endpush
@section('title','List Ads Admin')
@section('content')
  {{-- Content --}}



  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-10">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Advertise</h1>
    </div>




  {{-- INI TOMBOL CREATE --}}
    <div class="mt-3 md-2 mb-3">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#adsModalCreate">
      Create Advertise
    </button>
    </div>
    @if ($errors->any())
        <div class="my-3">
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
          @if(session('success'))
             <div class="my-3">
              <div class="alert alert-success">
                {{session('success')}}
              </div>
          @endif


   
          <div>
            <table class="table table-striped table-bordered" id="tabel-data">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Function</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $advertises as $item )
                  <tr>
                    <td>{{ $loop->iteration }}</td> 
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->desc }}</td>
                    <td>
                      @if($item->status == 1)
                      <span class="badge bg-success">Publish</span>
                      @else
                      <span class="badge bg-danger">Private</span>
                      @endif

                    </td>
                    <td>
                      <button class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalUpdate{{$item->id}}">Edit</button>
                      <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete{{$item->id}}">Delete</button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>











  </main>
  @include('back.ads.ads-create')
  @include('back.ads.ads-edit')
  @include('back.ads.ads-delete')
@endsection
@push('js')
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
  <script type="">

    $(document).ready(function(){
        $('#tabel-data').DataTable({});
        });
  </script>
@endpush


