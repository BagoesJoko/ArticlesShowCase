@extends('back.layout.template')
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap.css">
@endpush
@section('title','Create Article Admin')
@section('content')
  {{-- Content --}}      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Create Articles</h1>
      </div>
      <div class="mt-3 md-2">
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
         <form action="{{url('article')}}" method="post" enctype="multipart/form-data">
         	@csrf
         	<div class="row">
         		<div class="col-6">
         			<div class="mb-3">
         				<label for="title">Title</label>
         				<input type="text" id="title" name="title" class="form-control" value="{{old('title')}}">
         			</div>
         		</div>
         		<div class="col-6">
	         			<div class="mb-3">
	         				<label for="title">Category</label>
	         				<select name="category_id" id="category_id" class="form-control">
	         					<option value=""  hidden>-- choose --</option>
	         					@foreach($categories as $item)
	         					<option value="{{$item->id}}">{{$item->name}}</option>
	         					@endforeach
	         				</select>
	         			</div>
	         		</div>
         	</div>
         	<div class="mb-3">
         		<label for="desc">Description</label>
         		<textarea name="desc" id="myeditor" cols="10" rows="10" class="form-control"></textarea>
         	</div>
         	<div class="mb-3">
         		<label for="img">Image(Max 2mb)</label>
         		<input type="file" name="img" class="form-control">         	
         	</div>
         	<div class="row">
         		<div class="col-6">
         			<div class="mb-3">
         				<label for="status">Status</label>
         				<select name="status" id="status" class="form-control">
         					<option value="" hidden>-- choose --</option>
                  <option value="0">Private</option>
                  @if(auth()->user()->role == 1 )
                  <option value="1">Publish</option>
                  @endif
         				 </select>










                  {{-- <option value="" hidden>-- choose --</option>
         					<option value="1">Publish</option>
         					<option value="0">Private</option> --}}
         			</div>
         		</div>
         		<div class="col-6">
         			<div class="mb-3">
         				<label for="publish_date">Publish Date</label>
         				<input type="date" name="publish_date" id="publish_date" class="form-control">
         			</div>
         		</div>
         	</div>
          <div class="float-end">
              <button type="submmit" class="btn btn-success form-control">Save</button>
          </div>
         </form>
      </div>
      </main>
@endsection

@push('js')
  <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
  <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
  <script type="text/javascript">
    var options ={
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type-Images$_token=',
      filebrowserBrowseUrl : '/laravel-filemanager?type=Files',
      filebrowserUploadUrl : '/laravel-filemanager/upload?type=Files$_token=',
      clipboard_handleImages : false
    }
  </script>
  <script>
    CKEDITOR.replace( 'myeditor', options );
  </script>

@endpush

      
