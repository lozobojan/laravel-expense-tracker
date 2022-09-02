@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog podtipa troška</div>

                    <div class="card-body table-responsive">

                        <form action="{{ route('expense-subtype.store') }}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="Unesite naziv...">
                                </div>
                                <div class="col-6">
                                    <select name="expense_type_id" id="" class="form-control">
                                        <option value="">- odaberite tip -</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-success btn-block float-end">
                                        Sačuvaj
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
