<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use App\Models\Demo\CategoryContent;
use App\Models\Demo\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $contents = Content::where('category_content_id', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('slug_title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('url_github', 'LIKE', "%$keyword%")
                ->orWhere('url_youtube', 'LIKE', "%$keyword%")
                ->orWhere('url_ld', 'LIKE', "%$keyword%")
                ->orWhere('url_sc', 'LIKE', "%$keyword%")
                ->orWhere('url_db', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contents = Content::latest()->paginate($perPage);
        }

        return view('demo.contents.index', compact('contents'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $categoryContents =  CategoryContent::where('status', 'enable')->get();

        return view('demo.contents.create', compact('categoryContents'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'category_content_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'url_github' => 'required',
            'url_youtube' => 'required',
            'url_ld' => 'required',
            'url_sc' => 'required',
            'url_db' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);

        Content::create($requestData);

        return redirect()->route('contents.index')->with('toast_success', 'Content created successfully.');
    }

    public function show(Content $content)
    {
        return view('demo.contents.show', compact('content'));
    }

    public function edit(Content $content)
    {
        $categoryContents =  CategoryContent::where('status', 'enable')->get();

        return view('demo.contents.edit', compact('content', 'categoryContents'));
    }

    public function update(Request $request, Content $content)
    {
        $this->validate($request, [
            'category_content_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'url_github' => 'required',
            'url_youtube' => 'required',
            'url_ld' => 'required',
            'url_sc' => 'required',
            'url_db' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);

        $content->update($requestData);

        return redirect()->route('contents.index')->with('toast_success', 'Content updated successfully.');
    }

    public function destroy(Content $content)
    {
        $content->delete();

        return redirect()->route('contents.index')->with('toast_success', 'Content deleted successfully.');
    }

    public function delete($id)
    {
        $delete = Content::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Content deleted successfully.";
        } else {
            $success = false;
            $message = "Content not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
