<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseTypeRequest;
use App\Http\Requests\UpdateExpenseTypeRequest;
use App\Models\ExpenseType;
use Symfony\Component\HttpFoundation\Response;

class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => ExpenseType::query()->latest()->get()
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreExpenseTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExpenseTypeRequest $request)
    {
        $newExpense = ExpenseType::query()->create($request->all());
        return response([
            'data' => $newExpense
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  ExpenseType  $expense_type
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseType $expense_type)
    {
        return response([
            'data' => $expense_type
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateExpenseTypeRequest  $request
     * @param  ExpenseType $expense_type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExpenseTypeRequest $request, ExpenseType $expense_type)
    {
        return response([
            'data' => $expense_type
        ], $expense_type->update($request->all())
            ? Response::HTTP_OK
            : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ExpenseType $expense_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseType $expense_type)
    {
        return response([],
            $expense_type->delete()
                    ? Response::HTTP_OK
                    : Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
