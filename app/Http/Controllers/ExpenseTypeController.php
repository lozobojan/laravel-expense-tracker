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

    // TODO: implementirati nakon odgovora PM-a
    public function show(ExpenseType $expenseType)
    {
        //
    }


    public function edit(ExpenseType $expenseType)
    {
        return view('expense-type.edit', [
            'type' => $expenseType
        ]);
    }


    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->all());
        return redirect()->route('expense-type.index');
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
