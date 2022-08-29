@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog tipa troška</div>

                    <div class="card-body table-responsive">

                        <form action="{{ route('expense-type.store') }}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" name="name" class="form-control" placeholder="Unesite ime...">
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-success btn-block">
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
