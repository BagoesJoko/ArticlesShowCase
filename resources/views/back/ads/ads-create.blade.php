<div class="modal fade" id="adsModalCreate" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

        <form class="form-create" action="{{url('/advertise')}}" method="post" enctype="multipart/form-data">  
        @csrf
          <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title')}}" >
            @error('title')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>

          <div class="mb-3">
            <label for="desc" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="desc" placeholder="Enter any additional order notes..." id="myeditor" cols="10" rows="5" class="form-control mt-2 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm @error('desc') is-invalid @enderror" value="{{ old('desc')}}"></textarea>
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
                <option value="1">Publish</option>
                <option value="2">Private</option>
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

