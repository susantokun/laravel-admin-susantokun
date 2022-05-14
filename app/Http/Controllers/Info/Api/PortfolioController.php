<?php

namespace App\Http\Controllers\Info\Api;

use App\Http\Controllers\Controller;
use App\Models\Info\Portfolio;
use App\Resources\Info\PortfolioResource;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->paginate(25);

        return PortfolioResource::collection($portfolios);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'category_portfolio_id' => 'required',
			'title' => 'required',
            'slug_title' => 'required',
            'description' => 'required',
			'number_sp' => 'required',
			'number_sstp' => 'required',
			'date_start' => 'required',
			'status' => 'required'
		]);
        $portfolio = Portfolio::create($request->all());

        return response()->json($portfolio, 201);
    }

    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return $portfolio;
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
			'category_portfolio_id' => 'required',
			'title' => 'required',
            'slug_title' => 'required',
            'description' => 'required',
			'number_sp' => 'required',
			'number_sstp' => 'required',
			'date_start' => 'required',
			'status' => 'required'
		]);
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->update($request->all());

        return response()->json($portfolio, 200);
    }

    public function destroy($id)
    {
        Portfolio::destroy($id);

        return response()->json(null, 204);
    }
}
