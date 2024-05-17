      {{-- start add pictures --}}
  
      <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="uploadModalLabel">Upload Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('storePictures') }}" class="dropzone" id="my-dropzone">
                        @csrf
                        <input type="hidden" value="{{$album->id}}" name="album_id">
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- end add pictures --}}