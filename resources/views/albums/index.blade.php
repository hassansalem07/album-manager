@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="header">
            <h1>Albums</h1>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-modal">
                Create New Album
            </button>
        </div>
        <div class="album-list">
            @foreach($albums as $album)
            <div class="album-card">
                    <h2><a href="{{ route('albumPictures', $album) }}">{{ $album->name }}</a></h2>
                    <div class="album-actions">
                        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#edit-modal-{{$album->id}}">
                            Edit
                        </button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-modal-{{$album->id}}">
                            Delete
                        </button>
                        @if ($album->pictures()->count() == 0)
                @include('includes.delete_empty_album')
                        @else
                @include('includes.delete_album_non_empty')
                @include('includes.delete_with_move')
                        @endif
                    </div>
                @include('includes.update_album')
            </div>
            @endforeach
        </div>
    </div>
                @include('includes.add_album')
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
      $('#move').click(function(){
        $('.deleteModal').modal('hide');
      });
    });
  </script>
@endsection
