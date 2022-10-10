@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Izvještaji
                    </div>

                    <div class="card-body table-responsive">

                        <form action="{{ route('generate-report') }}" method="POST">
                            @csrf
                            <div class="row my-3">
                                <div class="col-3">
                                    <input type="date" class="form-control" name="filter_date_from" placeholder="Date from" value="{{ session()->get('filter_date_from') ?? "" }}">
                                </div>
                                <div class="col-3">
                                    <input type="date" class="form-control" name="filter_date_to" placeholder="Date to" value="{{ session()->get('filter_date_to') ?? "" }}">
                                </div>
                                <div class="col-3">
                                    <input type="number" step="0.01" class="form-control" name="filter_amount_from" placeholder="Amount from" value="{{ session()->get('filter_amount_from') ?? "" }}">
                                </div>
                                <div class="col-3">
                                    <input type="number" step="0.01" class="form-control" name="filter_amount_to" placeholder="Amount to" value="{{ session()->get('filter_amount_to') ?? "" }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-3 offset-9">
                                    <button class="btn btn-success w-100">Generiši</button>
                                </div>
                            </div>
                        </form>

                        @if(isset($expenses))
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Datum</th>
                                    <th>Tip</th>
                                    <th>Podtip</th>
                                    <th>Iznos</th>
                                    <th>Opis</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->id }}</td>
                                        <td>{{ $expense->date_formatted }}</td>
                                        <td>{{ $expense->expense_subtype->expense_type->name }}</td>
                                        <td>{{ $expense->expense_subtype->name }}</td>
                                        <td>{{ $expense->amount_formatted }}</td>
                                        <td>{{ $expense->description_trimmed }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
