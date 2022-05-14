<?php

namespace App\Http\Controllers\Info;

use App\Http\Controllers\Controller;
use App\Models\Info\CategoryPortfolio;
use App\Models\Info\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $portfolios = Portfolio::where('category_portfolio_id', 'LIKE', "%$keyword%")
                ->orWhere('title', 'LIKE', "%$keyword%")
                ->orWhere('slug_title', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('url_demo', 'LIKE', "%$keyword%")
                ->orWhere('url_youtube', 'LIKE', "%$keyword%")
                ->orWhere('number_sp', 'LIKE', "%$keyword%")
                ->orWhere('number_sstp', 'LIKE', "%$keyword%")
                ->orWhere('date_start', 'LIKE', "%$keyword%")
                ->orWhere('date_end', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $portfolios = Portfolio::latest()->paginate($perPage);
        }

        return view('info.portfolios.index', compact('portfolios'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $categoryPortfolios =  CategoryPortfolio::where('status', 'enable')->get();

        return view('info.portfolios.create', compact('categoryPortfolios'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
			'category_portfolio_id' => 'required',
			'title' => 'required',
			'description' => 'required',
			'number_sp' => 'required',
			'number_sstp' => 'required',
			'date_start' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);
        $requestData['date_start'] = Carbon::parse($request->date_start)->format('Y-m-d');
        $requestData['date_end'] = Carbon::parse($request->date_end)->format('Y-m-d');


        Portfolio::create($requestData);

        return redirect()->route('portfolios.index')->with('toast_success', 'Portfolio created successfully.');
    }

    public function show(Portfolio $portfolio)
    {
        return view('info.portfolios.show', compact('portfolio'));
    }

    public function edit(Portfolio $portfolio)
    {
        $categoryPortfolios =  CategoryPortfolio::where('status', 'enable')->get();

        return view('info.portfolios.edit', compact('portfolio', 'categoryPortfolios'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $this->validate($request, [
			'category_portfolio_id' => 'required',
			'title' => 'required',
			'description' => 'required',
			'number_sp' => 'required',
			'number_sstp' => 'required',
			'date_start' => 'required',
			'status' => 'required'
		]);
        $requestData = $request->all();
        $requestData['slug_title'] = Str::slug($request->title);
        $requestData['updated_at'] = '2020-03-01 09:32:34';

        $portfolio->update($requestData);

        return redirect()->route('portfolios.index')->with('toast_success', 'Portfolio updated successfully.');
    }

    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();

        return redirect()->route('portfolios.index')->with('toast_success', 'Portfolio deleted successfully.');
    }

    public function delete($id)
    {
        $delete = Portfolio::where('id', $id)->delete();

        if ($delete == 1) {
            $success = true;
            $message = "Portfolio deleted successfully.";
        } else {
            $success = false;
            $message = "Portfolio not found!";
        }

        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
