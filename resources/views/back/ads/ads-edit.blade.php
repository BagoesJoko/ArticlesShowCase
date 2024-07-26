@foreach($advertises as $item)
  <div class="modal fade" id="modalUpdate{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- form --}}
          <form action="{{url ('advertise/'. $item->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="oldImg" value="{{$item->img}}">
            <div class="mb-3">
              <label for="title">Title</label>
              <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item->title)}}" >
              @error('title')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="desc">Description</label>
              <textarea name="desc" id="desc" cols="10" rows="5" class="form-control @error('desc') is-invalid @enderror" value="{{ old('desc')}}"></textarea>
              @error('desc')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
              @enderror
            </div>
            
            <div class="mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                  <option value="" hidden>-- choose --</option>
                  <option value="1" {{ $item -> status  == 1 ? 'selected' : null}}>Publish</option>
                  <option value="2"{{ $item -> status  == 2 ? 'selected' : null}}>Private</option>
                </select>
              </div>

               <div class="mb-3">
                  <label for="img">Image(Max 2mb)</label>
                  <input type="file" id="img" name="img" class="form-control @error('img') is-invalid @enderror" value="{{ old('img')}}">
                  @error('img')
                          <div class="invalid-feedback">
                            {{$message}}
                          </div>
                  @enderror
                  <div class="mt-2">
                  <img src="{{asset('storage/back/'.$item->img)}}" alt="" width="120px">
                    <p><small>Gambar Lama</small></p>
                  </div>             
                </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Save</button>
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
@endforeach