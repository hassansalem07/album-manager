   {{-- start update album --}}
   <form action="{{ route('albums.update', $album) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="modal fade" id="edit-modal-{{$album->id}}" tabindex="-1" aria-labelledby="edit-modal-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit-modal-Label">Edit Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                    <div class="row">
                        <label for="">Album Name</label>
                        <input class="form-control" type="text" name="name" value="{{ $album->name }}" required>                        
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
{{-- end update album --}}