@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <span>Podtipov troškova</span>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('expense-subtype.create') }}" class="btn btn-outline-primary btn-sm float-end">+</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tip</th>
                                    <th>Naziv</th>
                                    <th>Detalji</th>
                                    <th>Izmjena</th>
                                    <th>Brisanje</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($subtypes as $subtype)
                                    <tr>
                                        <th>{{ $subtype->id }}</th>
                                        <th>{{ $subtype->expense_type->name }}</th>
                                        <th>{{ $subtype->name }}</th>
                                        <th>...</th>
                                        <th>
                                            <a href="{{ route('expense-subtype.edit', ['expense_subtype' => $subtype]) }}">
                                                izmjena
                                            </a>
                                        </th>
                                        <th>
                                            <form method="POST" id="delete-form-{{ $subtype->id }}" action="{{ route('expense-subtype.destroy', ['expense_subtype' => $subtype]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="deleteSubtype({{ $subtype->id }})" class="btn btn-sm btn-outline-danger">x</a>
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
        function deleteSubtype(id){
            if(confirm('Da li ste sigurni?')){
                document.getElementById('delete-form-'+id).submit();
            }
        }
    </script>
@endsection
