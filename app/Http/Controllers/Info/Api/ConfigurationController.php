<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\Configuration;
use App\Resources\Info\ConfigurationResource;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::latest()->paginate(25);

        return ConfigurationResource::collection($configurations);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'social_media_id' => 'required',
			'website_name' => 'required',
			'author' => 'required',
			'url' => 'required',
			'email' => 'required',
			'telp' => 'required',
			'place_of_birth' => 'required',
			'date_of_birth' => 'required',
            'keywords' => 'required',
            'metatext' => 'required',
			'about' => 'required',
            'introduction' => 'required'
		]);
        $configuration = Configuration::create($request->all());

        return response()->json($configuration, 201);
    }

    public function show($id)
    {
        $configuration = Configuration::findOrFail($id);

        return $configuration;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'social_media_id' => 'required',
			'website_name' => 'required',
			'author' => 'required',
			'url' => 'required',
			'email' => 'required',
			'telp' => 'required',
			'place_of_birth' => 'required',
			'date_of_birth' => 'required',
            'keywords' => 'required',
            'metatext' => 'required',
            'about' => 'required',
            'introduction' => 'required'
		]);
        $configuration = Configuration::findOrFail($id);
        $configuration->update($request->all());

        return response()->json($configuration, 200);
    }

    public function destroy($id)
    {
        Configuration::destroy($id);

        return response()->json(null, 204);
    }
}
