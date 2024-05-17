<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Picture;
use Illuminate\Http\Request;

class PictureController extends Controller
{
    public function index (Album $album)
    {
       $pictures = $album->pictures;
       return view('pictures.index',compact('album','pictures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);

            // Save image name to database
            Picture::create([
                'name' => $imageName,
                'album_id' => $request->album_id,
            ]);

            return response()->json(['success' => 'Image uploaded successfully']);
        }

        return response()->json(['error' => 'File not uploaded'], 400);
    }
    

    public function destroy(Picture $picture)
    {
        $picture->delete();
        return redirect()->back();
    }
}
