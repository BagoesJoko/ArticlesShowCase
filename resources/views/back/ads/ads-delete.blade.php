@foreach($advertises as $item)
  <div class="modal fade" id="modalDelete{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Category</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {{-- form --}}
          <form action="{{url ('advertise/'. $item->id)}}" method="post" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <div class="mb-3">
              <p>Are u sure delete advertises, titele {{$item->title}}..?</p>
            </div>
            

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
          </form>
        </div>

      </div>
    </div>
  </div>
@endforeach