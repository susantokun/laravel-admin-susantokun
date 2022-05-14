<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\Place;
use App\Resources\Info\PlaceResource;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index()
    {
        $places = Place::latest()->paginate(25);

        return PlaceResource::collection($places);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
            'description' => 'required',
			'color' => 'required'
		]);
        $place = Place::create($request->all());

        return response()->json($place, 201);
    }

    public function show($id)
    {
        $place = Place::findOrFail($id);

        return $place;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
			'color' => 'required'
		]);
        $place = Place::findOrFail($id);
        $place->update($request->all());

        return response()->json($place, 200);
    }

    public function destroy($id)
    {
        Place::destroy($id);

        return response()->json(null, 204);
    }
}
