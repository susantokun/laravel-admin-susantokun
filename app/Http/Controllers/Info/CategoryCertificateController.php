<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\CategoryCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryCertificateController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $categoryCertificates = CategoryCertificate::where('title', 'LIKE', "%$keyword%")
                ->orWhere('slug_title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categoryCertificates = CategoryCertificate::latest()->paginate($perPage);
        }

        return view('info.category-certificates.index', compact('categoryCertificates'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('info.category-certificates.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'description' => 'required',
			'color' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);

        CategoryCertificate::create($requestData);

        return redirect()->route('category-certificates.index')->with('toast_success', 'Category Certificate created successfully.');
    }

    public function show(CategoryCertificate $categoryCertificate)
    {
        return view('info.category-certificates.show', compact('categoryCertificate'));
    }

    public function edit(CategoryCertificate $categoryCertificate)
    {
        return view('info.category-certificates.edit', compact('categoryCertificate'));
    }

    public function update(Request $request, CategoryCertificate $categoryCertificate)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
			'color' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);

        $categoryCertificate->update($requestData);

        return redirect()->route('category-certificates.index')->with('toast_success', 'Category Certificate updated successfully.');
    }

    public function destroy(CategoryCertificate $categoryCertificate)
    {
        $categoryCertificate->delete();

        return redirect()->route('category-certificates.index')->with('toast_success', 'Category Certificate deleted successfully.');
    }

    public function delete($id)
    {
        $delete = CategoryCertificate::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Category Certificate deleted successfully.";
        } else {
            $success = false;
            $message = "Category Certificate not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
