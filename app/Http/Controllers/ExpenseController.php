<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use App\Models\Expense;
use App\Models\ExpenseType;
use Illuminate\Support\Facades\Storage;

class ExpenseController extends Controller
{

    public function index()
    {
        $expenses = Expense::query()->latest()->get();
        return view('expense.index', compact('expenses'));
    }

    public function create()
    {
        $types = ExpenseType::query()->orderBy('name')->get();
        return view('expense.create', compact('types'));
    }


    public function store(StoreExpenseRequest $request)
    {
        $newExpense = auth()->user()->expenses()->create($request->all());

        if ($request->has('files')){

            if(!Storage::exists('attachments'))
                Storage::makeDirectory('attachments');

            foreach ($request->file('files') as $file) {
                $newExpense->attachments()->create([
                    'file_path' => Storage::put('attachments', $file)
                ]);
            }
        }

        return redirect()->route('expense.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseRequest  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
