<?php

namespace App\Http\Controllers\Demo\Api;

use App\Http\Controllers\Controller;
use App\Models\Demo\Content;
use App\Resources\Demo\ContentResource;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::where('status','enable')->latest()->paginate(25);

        return ContentResource::collection($contents);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'category_content_id' => 'required',
			'title' => 'required',
			'slug_title' => 'required',
			'description' => 'required',
			'url_github' => 'required',
			'url_youtube' => 'required',
			'url_ld' => 'required',
			'url_sc' => 'required',
			'url_db' => 'required',
			'status' => 'required'
		]);
        $content = Content::create($request->all());

        return response()->json($content, 201);
    }

    public function show($id)
    {
        $content = Content::where('status','enable')->findOrFail($id);

        return $content;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'category_content_id' => 'required',
			'title' => 'required',
			'slug_title' => 'required',
			'description' => 'required',
			'url_github' => 'required',
			'url_youtube' => 'required',
			'url_ld' => 'required',
			'url_sc' => 'required',
			'url_db' => 'required',
			'status' => 'required'
		]);
        $content = Content::findOrFail($id);
        $content->update($request->all());

        return response()->json($content, 200);
    }

    public function destroy($id)
    {
        Content::destroy($id);

        return response()->json(null, 204);
    }
}
