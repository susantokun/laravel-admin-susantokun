<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\Platform;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlatformController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $platforms = Platform::where('name', 'LIKE', "%$keyword%")
                ->orWhere('slug_name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $platforms = Platform::latest()->paginate($perPage);
        }

        return view('info.platforms.index', compact('platforms'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('info.platforms.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['slug_name'] = Str::slug($request->name);

        Platform::create($requestData);

        return redirect()->route('platforms.index')->with('toast_success', 'Platform created successfully.');
    }

    public function show(Platform $platform)
    {
        return view('info.platforms.show', compact('platform'));
    }

    public function edit(Platform $platform)
    {
        return view('info.platforms.edit', compact('platform'));
    }

    public function update(Request $request, Platform $platform)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['slug_name'] = Str::slug($request->name);

        $platform->update($requestData);

        return redirect()->route('platforms.index')->with('toast_success', 'Platform updated successfully.');
    }

    public function destroy(Platform $platform)
    {
        $platform->delete();

        return redirect()->route('platforms.index')->with('toast_success', 'Platform deleted successfully.');
    }

    public function delete($id)
    {
        $delete = Platform::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Platform deleted successfully.";
        } else {
            $success = false;
            $message = "Platform not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
