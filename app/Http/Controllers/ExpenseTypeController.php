<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use App\Models\ExpenseType;

class ExpenseTypeController extends Controller
{

    public function index()
    {
        return view('expense-type.index', [
            'types' => ExpenseType::all()
        ]);
    }


    public function create()
    {
        return view('expense-type.create');
    }


    public function store(StoreExpenseTypeRequest $request)
    {
        ExpenseType::query()->create($request->all());
        return redirect()->route('expense-type.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpenseType $expenseType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpenseTypeRequest  $request
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseType  $expenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseType $expenseType)
    {
        //
    }
}
