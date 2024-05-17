   {{-- start modal to delete non-empty album --}}
   <div class="modal fade deleteModal" id="delete-modal-{{$album->id}}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                This album contains pictures, you can delete all pictures or move all of them to another album before delete it.
            </div>
            {{-- start options to delete with move pictures or delete without move --}}
            <div class="modal-footer">
                <form id="deleteForm" action="{{ route('deleteWithPictures', $album->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">delete all pictures</button>
                </form>
                <form id="deleteForm" action="{{ route('albums.destroy', $album) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-info" id="move" data-toggle="modal" 
                    data-target="#move-modal-{{$album->id}}">move the pictures</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
            {{-- end options to delete with move pictures or delete without move --}}

        </div>
    </div>
</div>
{{-- end modal to delete non-empty album --}}