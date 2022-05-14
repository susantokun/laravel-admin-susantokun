<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\Configuration;
use App\Models\Info\MediaSocial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigurationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $configurations = Configuration::where('media_social_id', 'LIKE', "%$keyword%")
                ->orWhere('website_name', 'LIKE', "%$keyword%")
                ->orWhere('author', 'LIKE', "%$keyword%")
                ->orWhere('url', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('favicon', 'LIKE', "%$keyword%")
                ->orWhere('avatar', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('telp', 'LIKE', "%$keyword%")
                ->orWhere('place_of_birth', 'LIKE', "%$keyword%")
                ->orWhere('date_of_birth', 'LIKE', "%$keyword%")
                ->orWhere('profession', 'LIKE', "%$keyword%")
                ->orWhere('job_specialization', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('latitude', 'LIKE', "%$keyword%")
                ->orWhere('longitude', 'LIKE', "%$keyword%")
                ->orWhere('api_key', 'LIKE', "%$keyword%")
                ->orWhere('website_1', 'LIKE', "%$keyword%")
                ->orWhere('website_2', 'LIKE', "%$keyword%")
                ->orWhere('website_3', 'LIKE', "%$keyword%")
                ->orWhere('keywords', 'LIKE', "%$keyword%")
                ->orWhere('metatext', 'LIKE', "%$keyword%")
                ->orWhere('about', 'LIKE', "%$keyword%")
                ->orWhere('introduction', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $configurations = Configuration::latest()->paginate($perPage);
        }

        return view('info.configurations.index', compact('configurations'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $mediaSocials = MediaSocial::where('status', 'enable')->get();

        return view('info.configurations.create', compact('mediaSocials'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'media_social_id' => 'required',
            'website_name' => 'required',
            'author' => 'required',
            'url' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'keywords' => 'required',
            'metatext' => 'required',
            'about' => 'required',
            'introduction' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('logo')) {
            $extensionLogo = $request->logo->getClientOriginalExtension();
            $requestData['logo'] = $request->file('logo')->storeAs('uploads/logos', 'logo.' . $extensionLogo, 'public');
        }
        if ($request->hasFile('favicon')) {
            $extensionFavicon = $request->favicon->getClientOriginalExtension();
            $requestData['favicon'] = $request->file('logo')->storeAs('uploads/icons', 'susantokun.' . $extensionFavicon, 'public');
        }
        if ($request->hasFile('avatar')) {
            $extensionAavatar = $request->avatar->getClientOriginalExtension();
            $requestData['avatar'] = $request->file('logo')->storeAs('uploads/avatars', 'avatar.' . $extensionAavatar, 'public')->resizeCanvas(245, 245);
        }

        Configuration::create($requestData);

        return redirect()->route('configurations.index')->with('toast_success', 'Configuration created successfully.');
    }

    public function show(Configuration $configuration)
    {
        return view('info.configurations.show', compact('configuration'));
    }

    public function edit(Configuration $configuration)
    {
        $mediaSocials = MediaSocial::where('status', 'enable')->get();
        return view('info.configurations.edit', compact('configuration', 'mediaSocials'));
    }

    public function update(Request $request, Configuration $configuration)
    {
        $this->validate($request, [
            'media_social_id' => 'required',
            'website_name' => 'required',
            'author' => 'required',
            'url' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'keywords' => 'required',
            'metatext' => 'required',
            'about' => 'required',
            'introduction' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();

        if ($request->hasFile('logo')) {
            $extensionLogo = $request->logo->getClientOriginalExtension();
            if (Storage::exists('public/' . $configuration->logo)) {
                Storage::delete('public/' . $configuration->logo);
            }
            $requestData['logo'] = $request->file('logo')->storeAs('uploads/logos', 'logo.' . $extensionLogo, 'public');
        }
        if ($request->hasFile('favicon')) {
            $extensionFavicon = $request->favicon->getClientOriginalExtension();
            if (Storage::exists('public/' . $configuration->favicon)) {
                Storage::delete('public/' . $configuration->favicon);
            }
            $requestData['favicon'] = $request->file('favicon')->storeAs('uploads/icons', 'susantokun.' . $extensionFavicon, 'public');
        }
        if ($request->hasFile('avatar')) {
            $extensionAavatar = $request->avatar->getClientOriginalExtension();
            if (Storage::exists('public/' . $configuration->avatar)) {
                Storage::delete('public/' . $configuration->avatar);
            }
            $requestData['avatar'] = $request->file('avatar')->storeAs('uploads/avatars', 'avatar.' . $extensionAavatar, 'public');
        }

        $configuration->update($requestData);

        return redirect()->route('configurations.index')->with('toast_success', 'Configuration updated successfully.');
    }

    public function destroy(Configuration $configuration)
    {
        $configuration->delete();

        return redirect()->route('configurations.index')->with('toast_success', 'Configuration deleted successfully.');
    }

    public function delete($id)
    {
        $delete = Configuration::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Configuration deleted successfully.";
        } else {
            $success = false;
            $message = "Configuration not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
