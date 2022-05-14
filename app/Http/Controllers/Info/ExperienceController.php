<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\Experience;
use App\Models\Info\Place;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $experiences = Experience::where('place_id', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $experiences = Experience::latest()->paginate($perPage);
        }

        return view('info.experiences.index', compact('experiences'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $places = Place::where('status','enable')->get();
        return view('info.experiences.create', compact('places'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'place_id' => 'required',
			'content' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();

        Experience::create($requestData);

        return redirect()->route('experiences.index')->with('toast_success', 'Experience created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('info.experiences.show', compact('experience'));
    }

    public function edit(Experience $experience)
    {
        $places = Place::where('status', 'enable')->get();

        return view('info.experiences.edit', compact('experience','places'));
    }

    public function update(Request $request, Experience $experience)
    {
        $this->validate($request, [
			'place_id' => 'required',
			'content' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();

        $experience->update($requestData);

        return redirect()->route('experiences.index')->with('toast_success', 'Experience updated successfully.');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();

        return redirect()->route('experiences.index')->with('toast_success', 'Experience deleted successfully.');
    }

    public function delete($id)
    {
        $delete = Experience::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Experience deleted successfully.";
        } else {
            $success = false;
            $message = "Experience not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
