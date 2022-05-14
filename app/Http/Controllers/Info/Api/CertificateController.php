<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\Certificate;
use App\Resources\Info\CertificateResource;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::where('status','enable')->orderBy('date_of_activity','desc')->paginate(25);

        return CertificateResource::collection($certificates);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'category_certificate_id' => 'required',
			'title' => 'required',
            'slug_title' => 'required',
            'description' => 'required',
			'activity_level' => 'required',
			'slug_activiy_level' => 'required',
			'date_of_activity' => 'required',
			'status' => 'required'
		]);
        $certificate = Certificate::create($request->all());

        return response()->json($certificate, 201);
    }

    public function show($id)
    {
        $certificate = Certificate::where('status', 'enable')->findOrFail($id);

        return $certificate;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'category_certificate_id' => 'required',
			'title' => 'required',
            'slug_title' => 'required',
            'description' => 'required',
			'activity_level' => 'required',
			'slug_activiy_level' => 'required',
			'date_of_activity' => 'required',
			'status' => 'required'
		]);
        $certificate = Certificate::findOrFail($id);
        $certificate->update($request->all());

        return response()->json($certificate, 200);
    }

    public function destroy($id)
    {
        Certificate::destroy($id);

        return response()->json(null, 204);
    }
}
