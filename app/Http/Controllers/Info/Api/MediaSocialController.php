<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\MediaSocial;
use App\Resources\Info\MediaSocialResource;
use Illuminate\Http\Request;

class MediaSocialController extends Controller
{
    public function index()
    {
        $mediaSocials = MediaSocial::where('status','enable')->latest()->paginate(25);

        return MediaSocialResource::collection($mediaSocials);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'status' => 'required'
		]);
        $mediaSocial = MediaSocial::create($request->all());

        return response()->json($mediaSocial, 201);
    }

    public function show($id)
    {
        $mediaSocial = MediaSocial::where('status','enable')->findOrFail($id);

        return $mediaSocial;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
			'status' => 'required'
		]);
        $mediaSocial = MediaSocial::findOrFail($id);
        $mediaSocial->update($request->all());

        return response()->json($mediaSocial, 200);
    }

    public function destroy($id)
    {
        MediaSocial::destroy($id);

        return response()->json(null, 204);
    }
}
