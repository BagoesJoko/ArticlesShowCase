@extends('back.layout.template')
@section('title','Detail Article Admin')
@section('content')
  {{-- Content --}}      
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Articles</h1>
      </div>
      <div class="mt-3 md-2">        
      	<table class="table table-striped table-bordered" width="100%" cellspacing="0">
      		<tr>
              <th width="220px">Titile</th>
              <td> {{$article->title}}</td>
          </tr>
          <tr>
              <th>Category</th>
              <td> {{$article->Category->name}}</td>
          </tr>
           <tr>
              <th>Description</th>
              <td> {!! $article->desc !!}</td>
          </tr>
           <tr>
              <th>Image</th>
              <td>
                <a href="{{asset('storage/back/'.$article->img)}}" target="_blank" rel="noopener noreferrer">
                  <img src="{{asset('storage/back/'.$article->img)}}" alt="" width="50%">
                </a>
              </td>
          </tr>
          <tr>
              <th>Views</th>
              <td> {{$article->viiews}}</td>
          </tr>
          <tr>
              <th>Status</th>
              @if($article->views == 0)
              <td><span class="badge bg-danger">Private</span></td>
              @else
              <td></td><span class="badge bg-success">Published</span></td>
              @endif
          </tr>
          <tr>
              <th>Publish Date</th>
              <td> {{$article->publish_date}}</td>
          </tr>
        
      	 </table>
         <div>
           <a href="{{url('article')}}" class="btn btn-secondary">Back</a>
         </div>
      </div>
      </main>
@endsection

      
