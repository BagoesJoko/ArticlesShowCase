@extends('back.layout.template')
@push('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap.css">
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.12.2/dist/sweetalert2.min.css" rel="stylesheet">
@endpush
@section('title','List Article Admin')
@section('content')
  {{-- Content --}}      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articles</h1>
      </div>
              <div class="card shadow mb-4 mt-3 justify-center">
                <div class="card-header py-3 text-center">
                  <a href="{{url('article/create')}}" class="btn btn-primary m-10 font-weight-bold">Create</a>
                
            </div>
         <div class="card-body">
      <div class="mt-3 md-2 table-responsive">
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
          <!-- success allert -->
          <div class="swal" data-swal="{{session('success')}}"></div>

          {{-- @if(session('success'))
             <div class="my-3">
              <div class="alert alert-success">
                {{session('success')}}
              </div>
          @endif --}}
      	<table class="table table-striped table-bordered" width="100%" cellspacing="0" id="tabel-data">
      		<thead>
      			<tr>
      				<th>No</th>
      				<th>Title</th>
      				<th>Category</th>
              <th>Views</th>
      				<th>Status</th>
      				<th>Publish Date</th>
      				<th>Function</th>
      			</tr>
      		</thead>
      		<tbody>
      			

      		</tbody>
      	 </table>
      </div>
        </div>
        </div>
      </main>
@endsection
@push('js')
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
  {{-- cdn sweetalert java script  --}}
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  {{-- alert succes from sweet alert java script  --}}
  <script>
    const swal = $('.swal').data('swal');
    if (swal) {
      Swal.fire({
        'title' : 'Success',
        'text'  : swal,
        'icon'  : 'success',
        'showConfirmButton' : 'false',
        'timer' : 2000

      })
    }
  function deleteArticle(e){
    let id = e.getAttribute('data-id');
      // alert('data di hapus' + id)
      Swal.fire({
        title: "Delete Article",
        text: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
      }).then((result) => {
        if (result.value) {
          $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                      type: 'DELETE',
                      url: '/article/' + id,
                      data : id,
                      dataType: "json",
                      success: function(response){
                      Swal.fire( {
                        'title' : 'Success',
                        'text'  : response.message,
                        'icon'  : 'success',
                      }).then((result) =>{
                        window.location.href = '/article';
                      })
                    },
                      error: function(xhr, ajaxOption, thrownError){
                      alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                      }
                  });    
        }
      });
    }
  </script>
  <script>

    $(document).ready(function(){
        $('#tabel-data').DataTable({
          processing: true,
          serverside: true,
          ajax:'{{url()->current()}}',
          columns:[
          {
          data:'DT_RowIndex',  
          name:'DT_RowIndex'
          },
          {
          data:'title',  
          name:'title'
          },
          {
            data:'category_id',
            name:'category_id'
          },
          {
          data:'views',  
          name:'views'
          },
          {
            data:'status',
            name:'status'
          },
          {
          data:'publish_date',  
          name:'publish_date'
          },
          {
            data:'button',
            name:'button'
          }
          ]
        });
    });
  </script>
@endpush