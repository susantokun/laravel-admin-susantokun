<?php

namespace App\Http\Controllers\Demo\Api;

use App\Http\Controllers\Controller;
use App\Models\Demo\CategoryContent;
use App\Resources\Demo\CategoryContentResource;
use Illuminate\Http\Request;

class CategoryContentController extends Controller
{
    public function index()
    {
        $categoryContents = CategoryContent::where('status','enable')->latest()->paginate(25);

        return CategoryContentResource::collection($categoryContents);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'slug_name' => 'required',
			'description' => 'required',
			'color' => 'required',
			'status' => 'required'
		]);
        $categoryContent = CategoryContent::create($request->all());

        return response()->json($categoryContent, 201);
    }

    public function show($id)
    {
        $categoryContent = CategoryContent::where('status','enable')->findOrFail($id);

        return $categoryContent;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'name' => 'required',
			'slug_name' => 'required',
			'description' => 'required',
			'color' => 'required',
			'status' => 'required'
		]);
        $categoryContent = CategoryContent::findOrFail($id);
        $categoryContent->update($request->all());

        return response()->json($categoryContent, 200);
    }

    public function destroy($id)
    {
        CategoryContent::destroy($id);

        return response()->json(null, 204);
    }
}
