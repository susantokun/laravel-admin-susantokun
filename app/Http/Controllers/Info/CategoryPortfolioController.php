<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\CategoryPortfolio;
use App\Models\Info\Framework;
use App\Models\Info\Platform;
use Illuminate\Http\Request;

class CategoryPortfolioController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $categoryPortfolios = CategoryPortfolio::where('platform_id', 'LIKE', "%$keyword%")
                ->orWhere('framework_id', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $categoryPortfolios = CategoryPortfolio::latest()->paginate($perPage);
        }

        return view('info.category-portfolios.index', compact('categoryPortfolios'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $frameworks =  Framework::where('status', 'enable')->get();
        $platforms =  Platform::where('status', 'enable')->get();
        return view('info.category-portfolios.create', compact('frameworks', 'platforms'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'platform_id' => 'required',
            'framework_id' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();

        CategoryPortfolio::create($requestData);

        return redirect()->route('category-portfolios.index')->with('toast_success', 'Category Portfolio created successfully.');
    }

    public function show(CategoryPortfolio $categoryPortfolio)
    {
        return view('info.category-portfolios.show', compact('categoryPortfolio'));
    }

    public function edit(CategoryPortfolio $categoryPortfolio)
    {
        $frameworks =  Framework::where('status', 'enable')->get();
        $platforms =  Platform::where('status', 'enable')->get();

        return view('info.category-portfolios.edit', compact('categoryPortfolio', 'frameworks', 'platforms'));
    }

    public function update(Request $request, CategoryPortfolio $categoryPortfolio)
    {
        $this->validate($request, [
            'description' => 'required',
            'platform_id' => 'required',
            'framework_id' => 'required',
            'status' => 'required'
        ]);
        $requestData = $request->all();

        $categoryPortfolio->update($requestData);

        return redirect()->route('category-portfolios.index')->with('toast_success', 'Category Portfolio updated successfully.');
    }

    public function destroy(CategoryPortfolio $categoryPortfolio)
    {
        $categoryPortfolio->delete();

        return redirect()->route('category-portfolios.index')->with('toast_success', 'Category Portfolio deleted successfully.');
    }

    public function delete($id)
    {
        $delete = CategoryPortfolio::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Category Portfolio deleted successfully.";
        } else {
            $success = false;
            $message = "Category Portfolio not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
