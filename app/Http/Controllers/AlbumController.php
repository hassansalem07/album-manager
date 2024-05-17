<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }


    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Album::create($request->all());
        return redirect()->route('albums.index');
    }


    public function update(Request $request, Album $album)
    {
        $request->validate(['name' => 'required']);
        $album->update($request->all());
        return redirect()->route('albums.index');
    }

    public function destroy(Album $album)
    {
        if ($album->pictures()->count() == 0) {
            $album->delete();
            return redirect()->route('albums.index');
        }
      
    }

    public function deleteWithPictures(Album $album)
    {
        $album->pictures()->delete();
        $album->delete();
        return redirect()->route('albums.index');
    }

    public function deleteWithMove(Request $request, Album $album)
    {
        $new_album = Album::find($request->new_album_id);
        if ($new_album) {
            foreach ($album->pictures as $picture) {
                $picture->album_id = $new_album->id;
                $picture->save();
            }
            $album->delete();
            return redirect()->route('albums.index');
        }
       
    }
}

