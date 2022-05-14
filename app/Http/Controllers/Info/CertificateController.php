<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\CategoryCertificate;
use App\Models\Info\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $certificates = Certificate::where('category_certificate_id', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('slug_title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('activity_level', 'LIKE', "%$keyword%")
                ->orWhere('slug_activity_level', 'LIKE', "%$keyword%")
                ->orWhere('date_of_activity', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orderBy('date_of_activity', 'desc')->paginate($perPage);
        } else {
            $certificates = Certificate::orderBy('date_of_activity','desc')->paginate($perPage);
        }

        return view('info.certificates.index', compact('certificates'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $categoryCertificates =  CategoryCertificate::where('status','enable')->get();

        return view('info.certificates.create', compact('categoryCertificates'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_certificate_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'activity_level' => 'required',
            'date_of_activity' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);
        $requestData['slug_activity_level'] = Str::slug($request->activity_level);
        $requestData['date_of_activity'] = Carbon::parse($request->date_of_activity)->format('Y-m-d');
        $randomString = Str::random(5);

        if ($request->hasFile('image')) {
            $getDataFromCategoryCertificate  = CategoryCertificate::where('id', $request->category_certificate_id)->get();
            $getCategoryCertificateSlugTitle = $getDataFromCategoryCertificate[0]->slug_title;
            $extensionImage                  = $request->image->getClientOriginalExtension();
            $nameImage                       = $getCategoryCertificateSlugTitle . '-' . Str::slug($request->activity_level) . '-' . Carbon::parse($request->date_of_activity)->format('Y') . '-' . Str::slug($request->title) . '-' .$randomString . '.' . $extensionImage;
            $requestData['image']            = $request->file('image')->storeAs('uploads/certificates', $nameImage, 'public');
        }

        Certificate::create($requestData);

        return redirect()->route('certificates.index')->with('toast_success', 'Certificate created successfully.');
    }

    public function show(Certificate $certificate)
    {
        return view('info.certificates.show', compact('certificate'));
    }

    public function edit(Certificate $certificate)
    {
        $categoryCertificates =  CategoryCertificate::where('status','enable')->get();

        return view('info.certificates.edit', compact('certificate', 'categoryCertificates'));
    }

    public function update(Request $request, Certificate $certificate)
    {
        $this->validate($request, [
            'category_certificate_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'activity_level' => 'required',
            'date_of_activity' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);
        $requestData['slug_activity_level'] = Str::slug($request->activity_level);
        $requestData['date_of_activity'] = Carbon::parse($request->date_of_activity)->format('Y-m-d');

        $getDataFromCategoryCertificate = CategoryCertificate::where('id', $request->category_certificate_id)->get();
        $getCategoryCertificateSlugTitle = $getDataFromCategoryCertificate[0]->slug_title;
        $randomString = Str::random(5);

        $slug_title = Str::slug($request->title);
        $slug_activity_level = Str::slug($request->activity_level);
        $year = Carbon::parse($request->date_of_activity)->format('Y');
        $yearOld = Carbon::parse($certificate->date_of_activity)->format('Y');
        $cagegory = $request->category_certificate_id;

        if (
            $request->hasFile('image') && $slug_title == $certificate->slug_title ||
            $slug_activity_level ==
            $certificate->slug_activity_level ||
            $year == $yearOld ||
            $cagegory == $certificate->category_certificate_id
        ) {
            if ($request->hasFile('image')) {
                if (Storage::exists('public/' . $certificate->image)) {
                    Storage::delete('public/' . $certificate->image);
                }
                $extensionImage = $request->image->getClientOriginalExtension();
                $nameImage = $getCategoryCertificateSlugTitle . '-' .
                    $slug_activity_level . '-' .
                    $year . '-' .
                    $slug_title . '-' .
                    $randomString . '.' .
                    $extensionImage;
                $requestData['image'] = $request->file('image')->storeAs('uploads/certificates', $nameImage, 'public');
            }
        }

        $certificate->update($requestData);

        return redirect()->route('certificates.index')->with('toast_success', 'Certificate updated successfully.');
    }

    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return redirect()->route('certificates.index')->with('toast_success', 'Certificate deleted successfully.');
    }

    public function delete($id)
    {
        $certificate = Certificate::findOrFail($id);

        if (Storage::exists('public/' . $certificate->image)) {
            Storage::delete('public/' . $certificate->image);
        }

        $delete = Certificate::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Certificate deleted successfully.";
        } else {
            $success = false;
            $message = "Certificate not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
