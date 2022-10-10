<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    public function getReportView(Request $request){
        return view('reports.index', [
            'types' => ExpenseType::query()->orderBy('name'),
        ]);
    }

    public function generateReport(Request $request){

        $key = md5($request->filter_date_from.$request->filter_date_to.$request->filter_amount_from.$request->filter_amount_to);

        if(Cache::has($key)){
            $expenses = Cache::get($key);
        }else{
            $expenses = Expense::query()
                ->when($request->filter_date_from, function($query) use ($request){
                    Session::put('filter_date_from', $request->filter_date_from);
                    $query->where('date', '>=', $request->filter_date_from);
                })
                ->when($request->filter_date_to, function($query) use ($request){
                    Session::put('filter_date_to', $request->filter_date_to);
                    $query->where('date', '<=', $request->filter_date_to);
                })
                ->when($request->filter_amount_from, function($query) use ($request){
                    Session::put('filter_amount_from', $request->filter_amount_from);
                    $query->where('amount', '>=', $request->filter_amount_from);
                })
                ->when($request->filter_amount_to, function($query) use ($request){
                    Session::put('filter_amount_to', $request->filter_amount_to);
                    $query->where('amount', '<=', $request->filter_amount_to);
                })
                ->get();
            Cache::put($key, $expenses, 60*60);
        }
        return view('reports.index', compact('expenses'));
    }
}
