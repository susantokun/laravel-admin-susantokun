<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\MediaSocial;
use Illuminate\Http\Request;

class MediaSocialController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $mediaSocials = MediaSocial::where('title', 'LIKE', "%$keyword%")
                ->orWhere('github', 'LIKE', "%$keyword%")
                ->orWhere('youtube', 'LIKE', "%$keyword%")
                ->orWhere('linked_in', 'LIKE', "%$keyword%")
                ->orWhere('facebook', 'LIKE', "%$keyword%")
                ->orWhere('twitter', 'LIKE', "%$keyword%")
                ->orWhere('instagram', 'LIKE', "%$keyword%")
                ->orWhere('line', 'LIKE', "%$keyword%")
                ->orWhere('steam', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mediaSocials = MediaSocial::latest()->paginate($perPage);
        }

        return view('info.media-socials.index', compact('mediaSocials'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        return view('info.media-socials.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'title' => 'required',
			'status' => 'required',
		]);
        $requestData = $request->all();

        MediaSocial::create($requestData);

        return redirect()->route('media-socials.index')->with('toast_success', 'Media Social created successfully.');
    }

    public function show(MediaSocial $mediaSocial)
    {
        return view('info.media-socials.show', compact('mediaSocial'));
    }

    public function edit(MediaSocial $mediaSocial)
    {
        return view('info.media-socials.edit', compact('mediaSocial'));
    }

    public function update(Request $request, MediaSocial $mediaSocial)
    {
        $this->validate($request, [
            'title' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();

        $mediaSocial->update($requestData);

        return redirect()->route('media-socials.index')->with('toast_success', 'Media Social updated successfully.');
    }

    public function destroy(MediaSocial $mediaSocial)
    {
        $mediaSocial->delete();

        return redirect()->route('media-socials.index')->with('toast_success', 'Media Social deleted successfully.');
    }

    public function delete($id)
    {
        $delete = MediaSocial::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Media Social deleted successfully.";
        } else {
            $success = false;
            $message = "Media Social not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
