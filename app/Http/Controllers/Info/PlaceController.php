<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\Place;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $places = Place::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('color', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $places = Place::latest()->paginate($perPage);
        }

        return view('info.places.index', compact('places'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('info.places.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
			'description' => 'required',
			'color' => 'required'
		]);
        $requestData = $request->all();
        
        Place::create($requestData);

        return redirect()->route('places.index')->with('toast_success', 'Place created successfully.');
    }

    public function show(Place $place)
    {
        return view('info.places.show', compact('place'));
    }

    public function edit(Place $place)
    {
        return view('info.places.edit', compact('place'));
    }

    public function update(Request $request, Place $place)
    {
        $this->validate($request, [
			'name' => 'required',
			'description' => 'required',
			'color' => 'required'
		]);
        $requestData = $request->all();
        
        $place->update($requestData);

        return redirect()->route('places.index')->with('toast_success', 'Place updated successfully.');
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return redirect()->route('places.index')->with('toast_success', 'Place deleted successfully.');
    }

    public function delete($id)
    {
        $delete = Place::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Place deleted successfully.";
        } else {
            $success = false;
            $message = "Place not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
