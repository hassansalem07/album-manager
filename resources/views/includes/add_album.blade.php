    {{-- start create new album --}}
    <form action="{{ route('albums.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="create-modal-Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="create-modal-Label">Create New Album</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="">Album Name</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </div>
        </div>
    </div>
</form>
    {{-- end create new album --}}