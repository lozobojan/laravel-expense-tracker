<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Expense::class, 'expense');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response([
            'data' => Expense::query()->latest()->get()
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                // $newExpense->addMedia($file)->toMediaCollection('attachments');
            }
        }

        return response([
            'data' => $newExpense
        ], Response::HTTP_OK);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
