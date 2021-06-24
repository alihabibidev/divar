<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Poster;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PosterController extends Controller
{
    public function addPoster(Request $request)
    {
        $title = $request['title'];
        $content = $request['content'];
//        $user_id = $request['user_id'];
        $user_id = "1";
//        $category_id = $request['category_id'];
        $category_id = "1";

        $poster = new Poster();
        $image = new Image();

        $request->validate([
            'file' => 'required|mimes:pdf,xlx,csv,png,jpeg,jpg,svg,gif|max:2048',
        ]);

        $fileName = time() . '.' . $request->file->extension();
//        $fileName = time() . Hash::make($title) . '.' . $request->file->extension();
        try {
            $request->file->move(public_path('uploads'), $fileName);
        } catch (\Exception $exception) {
            dd("error");
        }
        $path = "/uploads/$fileName";
        $poster->title = $title;
        $poster->content = $content;
        $poster->user_id = $user_id;
        $poster->category_id = $category_id;
        $poster->save();
        $image->path = $path;
        $image->poster_id = $poster->id;
        $image->save();

        return back()
            ->with('success', 'اطلاعات با موفقیت ثبت شد')
            ->with('file', $fileName);

    }

    public function deletePoster(Request $request)
    {

        $id = $request["id"];
        $result = Poster::where('id', $id)->delete();
    }

    public function getPosters()
    {
        $poster = Poster::with('images')->get();


        return view('show-poster', ['posters' => $poster]);
    }

    public function showPoster()
    {

    }

    public function updatePoster(Request $request)
    {
        $id = $request["id"];
        $title = $request['title'];
        $content = $request['content'];
        $user_id = $request['user_id'];
        $category_id = $request['category_id'];

        $poster = Poster::find($id);

        $poster->title = $title;
        $poster->content = $content;
        $poster->user_id = $user_id;
        $poster->category_id = $category_id;

        $poster->save();
    }
}
