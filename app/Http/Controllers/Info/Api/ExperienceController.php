<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\Experience;
use App\Resources\Info\ExperienceResource;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->paginate(25);

        return ExperienceResource::collection($experiences);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'place_id' => 'required',
			'content' => 'required',
			'status' => 'required'
		]);
        $experience = Experience::create($request->all());

        return response()->json($experience, 201);
    }

    public function show($id)
    {
        $experience = Experience::findOrFail($id);

        return $experience;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'place_id' => 'required',
			'content' => 'required',
			'status' => 'required'
		]);
        $experience = Experience::findOrFail($id);
        $experience->update($request->all());

        return response()->json($experience, 200);
    }

    public function destroy($id)
    {
        Experience::destroy($id);

        return response()->json(null, 204);
    }
}
