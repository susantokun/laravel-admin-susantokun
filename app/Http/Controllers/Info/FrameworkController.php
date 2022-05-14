<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\Framework;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FrameworkController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $frameworks = Framework::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug_name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $frameworks = Framework::latest()->paginate($perPage);
        }

        return view('info.frameworks.index', compact('frameworks'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('info.frameworks.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['slug_name'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $nameImage = $request->file('image')->getClientOriginalName();
            $requestData['image'] = $request->file('image')
                ->storeAs('uploads/frameworks', $nameImage, 'public');
        }

        Framework::create($requestData);

        return redirect()->route('frameworks.index')->with('toast_success', 'Framework created successfully.');
    }

    public function show(Framework $framework)
    {
        return view('info.frameworks.show', compact('framework'));
    }

    public function edit(Framework $framework)
    {
        return view('info.frameworks.edit', compact('framework'));
    }

    public function update(Request $request, Framework $framework)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['slug_name'] = Str::slug($request->name);

        if ($request->hasFile('image')) {
            $nameImage = $request->file('image')->getClientOriginalName();
            if (Storage::exists('public/' . $framework->image)) { // jika ada file sebelumnya di folder (sesusi dengan nama yg ada)
                Storage::delete('public/' . $framework->image); // hapus file tersebut
            }
            $requestData['image'] = $request->file('image')->storeAs('uploads/frameworks', $nameImage, 'public');
        }

        $framework->update($requestData);

        return redirect()->route('frameworks.index')->with('toast_success', 'Framework updated successfully.');
    }

    public function destroy(Framework $framework)
    {
        $framework->delete();

        return redirect()->route('frameworks.index')->with('toast_success', 'Framework deleted successfully.');
    }

    public function delete($id)
    {
        $framework = Framework::findOrFail($id);

        if (Storage::exists('public/' . $framework->image)) {
            Storage::delete('public/' . $framework->image);
        }

        $delete = Framework::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Framework deleted successfully.";
        } else {
            $success = false;
            $message = "Framework not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
