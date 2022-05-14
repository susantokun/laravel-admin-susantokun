<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\Framework;
use App\Resources\Info\FrameworkResource;
use Illuminate\Http\Request;

class FrameworkController extends Controller
{
    public function index()
    {
        $frameworks = Framework::latest()->paginate(25);

        return FrameworkResource::collection($frameworks);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'slug_name' => 'required'
		]);
        $framework = Framework::create($request->all());

        return response()->json($framework, 201);
    }

    public function show($id)
    {
        $framework = Framework::findOrFail($id);

        return $framework;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'slug_name' => 'required'
		]);
        $framework = Framework::findOrFail($id);
        $framework->update($request->all());

        return response()->json($framework, 200);
    }

    public function destroy($id)
    {
        Framework::destroy($id);

        return response()->json(null, 204);
    }
}
