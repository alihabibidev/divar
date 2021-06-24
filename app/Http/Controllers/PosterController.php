<?php

namespace App\Http\Controllers;

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
        $user_id = $request['user_id'];
        $category_id = $request['category_id'];

        $poster = new Poster();
        $poster->title = $title;
        $poster->content = $content;
        $poster->user_id = $user_id;
        $poster->category_id = $category_id;
        $poster->save();
        echo $poster->id;

    }

    public function deletePoster(Request $request)
    {

        $id = $request["id"];
        $result=Poster::where('id',$id)->delete();
    }

    public function getPosters()
    {
        $poster = Poster::all();
        return $poster;
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
