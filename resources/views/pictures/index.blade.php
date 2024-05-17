@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="header">
        <h1>{{$album->name}} - Pictures</h1>
        <a href="{{route('albums.index')}}" class="btn btn-secondary">Back</a>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#uploadModal">
            Open Upload Modal
        </button>
        </div>
    <div class="row">
      @forelse ($pictures as $picture)
          
      <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card">
          <img src="{{asset('images/'.$picture->name)}}" class="card-img-top" alt="{{$picture->name}}">
          <a class="btn btn-danger delete-image" href="{{route('deletePictures',$picture->id)}}"> <i class="fas fa-trash"></i></a>
        </div>
      </div>
      @empty
      No Pictures for this Album
      @endforelse

       @include('includes.add_picture')
    </div>
  </div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function() {
        var myDropzone = new Dropzone("#my-dropzone", {
            maxFilesize: 2,
            acceptedFiles: 'image/*',
            autoProcessQueue: true, 
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                location.reload();
            },
            error: function(file, response) {
                console.log(response);
            }
        });

        $('#uploadModal').on('shown.bs.modal', function () {
            myDropzone.resize();
        });
    });
</script>
@endsection
