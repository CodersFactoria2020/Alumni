<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Http\Resources\Tag as TagResource;


class TagController extends Controller
{

    public function index()
    {
        //
    }
    public function all()
    {
        $tags = TagResource::collection(Tag::all());
        return $tags;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Tag $tag)
    {
        //
    }

    public function edit(Tag $tag)
    {
        //
    }

    public function update(Request $request, Tag $tag)
    {
        //
    }

    public function destroy(Tag $tag)
    {
        //
    }
}
