@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <span>Troškovi</span>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('expense.create') }}" class="btn btn-outline-primary btn-sm float-end">+</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Datum</th>
                                    <th>Iznos</th>
                                    <th>Opis</th>
                                    <th>Izmjena</th>
                                    <th>Brisanje</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($expenses as $expense)
                                    <tr>
                                        <td>{{ $expense->id }}</td>
                                        <td>{{ $expense->date_formatted }}</td>
                                        <td>{{ $expense->amount_formatted }}</td>
                                        <td>{{ $expense->description_trimmed }}</td>
                                        <td>
                                            <a @class(['disabled' => $expense->attachments()->count() == 0 , 'btn', 'btn-sm', 'btn-outline-primary']) href="{{ route('show-attachments', ['expense' => $expense]) }}">
                                                fajlovi
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('expense.edit', ['expense' => $expense]) }}" class="btn btn-sm btn-outline-primary">
                                                izmjena
                                            </a>
                                        </td>
                                        <th>
                                            <form method="POST" id="delete-form-{{ $expense->id }}" action="{{ route('expense.destroy', ['expense' => $expense]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="deleteExpense({{ $expense->id }})" class="btn btn-sm btn-outline-danger">x</a>
                                            </form>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script>
        function deleteExpense(id){
            if(confirm('Da li ste sigurni?')){
                document.getElementById('delete-form-'+id).submit();
            }
        }
    </script>
@endsection
