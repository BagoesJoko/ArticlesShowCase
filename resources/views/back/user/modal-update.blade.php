@foreach($users as $item)
<div class="modal fade" id="modalUpdate{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Users</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- form --}}
        <form action="{{url ('users/'.$item->id)}}" method="post">
          @method('PUT')
          @csrf

          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $item->name)}}" >
            @error('name')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
           <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $item->email)}}" >
            @error('email')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
           <div class="mb-3">
            <label for="password" class="mb-1">Password</label>
            <p><small>Kosongkan jika tidak ingin ganti</small></p>
            <input text="Kosongkan Jika tidak ingin ganti Password" type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password')}}" >
            @error('password')
              <div class="invalid-feedback">
                {{$message}}
              </div>
            @enderror
          </div>
           <div class="mb-3">
            <label for="password_confirmation" class="mb-1">Password Confirmation</label>
            <p><small>Kosongkan jika tidak ingin ganti</small></p>
            <input text="Kosongkan Jika tidak ingin ganti Password" type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ old('password')}}" >
            @error('password_confirmation')
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
@endforeach