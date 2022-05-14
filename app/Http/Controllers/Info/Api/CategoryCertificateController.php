<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\CategoryCertificate;
use App\Resources\Info\CategoryCertificateResource;
use Illuminate\Http\Request;

class CategoryCertificateController extends Controller
{
    public function index()
    {
        $categoryCertificates = CategoryCertificate::latest()->paginate(25);

        return CategoryCertificateResource::collection($categoryCertificates);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'slug_title' => 'required',
			'description' => 'required',
			'color' => 'required',
			'status' => 'required'
		]);
        $categoryCertificate = CategoryCertificate::create($request->all());

        return response()->json($categoryCertificate, 201);
    }

    public function show($id)
    {
        $categoryCertificate = CategoryCertificate::findOrFail($id);

        return $categoryCertificate;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'title' => 'required',
            'slug_title' => 'required',
            'description' => 'required',
			'color' => 'required',
			'status' => 'required'
		]);
        $categoryCertificate = CategoryCertificate::findOrFail($id);
        $categoryCertificate->update($request->all());

        return response()->json($categoryCertificate, 200);
    }

    public function destroy($id)
    {
        CategoryCertificate::destroy($id);

        return response()->json(null, 204);
    }
}
