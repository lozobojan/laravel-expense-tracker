@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dodavanje novog troška</div>

                    <div class="card-body table-responsive">

                        <form action="{{ route('expense.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" name="date" class="form-control" placeholder="Odaberite datum...">
                                </div>
                                <div class="col-6">
                                    <input type="number" name="amount" step="0.01" class="form-control" placeholder="Unesite iznos..">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6">
                                    <select name="type_id" class="form-control" id="type_id" onchange="loadSubtypes()">
                                        <option value="">- odaberite tip -</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <select name="expense_subtype_id" class="form-control" id="subtype_id"></select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <input type="file" name="files[]" multiple class="form-control">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <textarea name="description" id="" class="form-control" rows="3"></textarea>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-6 offset-6">
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

@section('additional_scripts')
    <script>
        async function loadSubtypes(){

            let typeId = document.getElementById('type_id').value;
            let response = await fetch('/expense-subtype/get-by-type/'+typeId);
            let subtypes = await response.json();

            let options = '';
            subtypes.forEach((s) => {
                options += `<option value="${s.id}">${s.name}</option>`;
            });

            document.getElementById('subtype_id').innerHTML = options;
        }
    </script>
@endsection
