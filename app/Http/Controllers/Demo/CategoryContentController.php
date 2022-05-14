<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Models\Demo\CategoryContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryContentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $categoryContents = CategoryContent::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug_name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categoryContents = CategoryContent::latest()->paginate($perPage);
        }

        return view('demo.category-contents.index', compact('categoryContents'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('demo.category-contents.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['slug_name'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $imageName = basename($request->file('image')->getClientOriginalName(), '.' . $request->file('image')->getClientOriginalExtension());
            $imageExtention = $request->image->getClientOriginalExtension();
            $time = time();
            $requestData['image'] = $request->file('image')
                ->storeAs('uploads/demos', $imageName . '-' . $time . '.' . $imageExtention, 'public');
        }

        CategoryContent::create($requestData);

        return redirect()->route('category-contents.index')->with('toast_success', 'Category Content created successfully.');
    }

    public function show(CategoryContent $categoryContent)
    {
        return view('demo.category-contents.show', compact('categoryContent'));
    }

    public function edit(CategoryContent $categoryContent)
    {
        return view('demo.category-contents.edit', compact('categoryContent'));
    }

    public function update(Request $request, CategoryContent $categoryContent)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'color' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['slug_name'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            if (Storage::exists('public/' . $categoryContent->image)) { // jika ada file sebelumnya di folder (sesusi dengan nama yg ada)
                Storage::delete('public/' . $categoryContent->image); // hapus file tersebut
            }
            $imageName = basename($request->file('image')->getClientOriginalName(), '.' . $request->file('image')->getClientOriginalExtension());
            $imageExtention = $request->image->getClientOriginalExtension();
            $time = time();
            $requestData['image'] = $request->file('image')
                ->storeAs('uploads/demos', $imageName . '-' . $time . '.' . $imageExtention, 'public');
        }

        $categoryContent->update($requestData);

        return redirect()->route('category-contents.index')->with('toast_success', 'Category Content updated successfully.');
    }

    public function destroy(CategoryContent $categoryContent)
    {
        $categoryContent->delete();

        return redirect()->route('category-contents.index')->with('toast_success', 'Category Content deleted successfully.');
    }

    public function delete($id)
    {
        $categoryContent = CategoryContent::findOrFail($id);

        if (Storage::exists('public/' . $categoryContent->image)) {
            Storage::delete('public/' . $categoryContent->image);
        }

        $delete = CategoryContent::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Category Content deleted successfully.";
        } else {
            $success = false;
            $message = "Category Content not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
