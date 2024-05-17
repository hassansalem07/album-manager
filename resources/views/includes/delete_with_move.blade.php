 {{-- start delete with move --}}
 <form action="{{route('deleteWithMove',$album->id)}}" method="POST">
    @csrf
<div class="modal fade" id="move-modal-{{$album->id}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <label for="new-album">select new album</label>
                        <select class="form-control" name="new_album_id" id="new-album">
                            @foreach (\App\Models\Album::where('id', '!=', $album->id)->get() as $new_album)
                                <option value="{{$new_album->id}}">{{$new_album->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
            </div>
            <div class="modal-footer">
                
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Move & Delete</button>

            </div>
        </div>
    </div>
</div>
</form>
{{-- end delete with move --}}