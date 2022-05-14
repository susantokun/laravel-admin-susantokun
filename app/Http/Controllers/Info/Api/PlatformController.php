<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Platform;
use App\Resources\Info\PlatformResource;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::latest()->paginate(25);

        return PlatformResource::collection($platforms);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'slug_name' => 'required'
        ]);
        $platform = Platform::create($request->all());

        return response()->json($platform, 201);
    }

    public function show($id)
    {
        $platform = Platform::findOrFail($id);

        return $platform;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'slug_name' => 'required'
        ]);
        $platform = Platform::findOrFail($id);
        $platform->update($request->all());

        return response()->json($platform, 200);
    }

    public function destroy($id)
    {
        Platform::destroy($id);

        return response()->json(null, 204);
    }
}
