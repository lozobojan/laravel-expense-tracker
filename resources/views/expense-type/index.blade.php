@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <span>Tipovi troškova</span>
                            </div>
                            <div class="col-6">
                                <a href="{{ route('expense-type.create') }}" class="btn btn-outline-primary btn-sm float-end">+</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Naziv</th>
                                    <th>Detalji</th>
                                    <th>Izmjena</th>
                                    <th>Brisanje</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($types as $type)
                                    <tr>
                                        <th>{{ $type->id }}</th>
                                        <th>{{ $type->name }}</th>
                                        <th>...</th>
                                        <th>...</th>
                                        <th>...</th>
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
