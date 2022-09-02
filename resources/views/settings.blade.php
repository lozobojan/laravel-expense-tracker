@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tipovi troškova koje pratim</div>

                    <div class="card-body">

                        @foreach($types as $type)
                            <form action="{{ route('expense-type.attach-detach', ['expense_type' => $type]) }}" method="POST" id="attach-detach-form-{{$type->id}}">
                                @csrf
                                <div class="row">
                                    <div class="col-1">
                                        <input type="checkbox" onchange="addRemoveType({{ $type->id }})" id="typechk-{{$type->id}}" @if(auth()->user()->hasExpenseType($type->id)) checked @endif>
                                    </div>
                                    <div class="col-11">
                                        <label for="typechk-{{$type->id}}">{{ $type->name }}</label>
                                    </div>
                                </div>
                            </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('additional_scripts')
    <script>
        function addRemoveType(typeId){
            document.getElementById('attach-detach-form-'+typeId).submit();
        }
    </script>
@endsection
