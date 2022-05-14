<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\CategoryPortfolio;
use App\Resources\Info\CategoryPortfolioResource;
use Illuminate\Http\Request;

class CategoryPortfolioController extends Controller
{
    public function index()
    {
        $categoryPortfolios = CategoryPortfolio::latest()->paginate(25);

        return CategoryPortfolioResource::collection($categoryPortfolios);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
			'platform_id' => 'required',
			'framework_id' => 'required',
			'status' => 'required'
		]);
        $categoryPortfolio = CategoryPortfolio::create($request->all());

        return response()->json($categoryPortfolio, 201);
    }

    public function show($id)
    {
        $categoryPortfolio = CategoryPortfolio::findOrFail($id);

        return $categoryPortfolio;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'description' => 'required',
			'platform_id' => 'required',
			'framework_id' => 'required',
			'status' => 'required'
		]);
        $categoryPortfolio = CategoryPortfolio::findOrFail($id);
        $categoryPortfolio->update($request->all());

        return response()->json($categoryPortfolio, 200);
    }

    public function destroy($id)
    {
        CategoryPortfolio::destroy($id);

        return response()->json(null, 204);
    }
}
