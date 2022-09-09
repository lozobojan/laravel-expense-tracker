@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <span>Fajlovi</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-body table-responsive">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Preuzimanje</th>
                                    <th>Brisanje</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($attachments as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>
                                            <a href="{{ $a->download_link }}" download>
                                                {{ $a->file_path }}
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST" id="delete-form-{{ $a->id }}" action="{{ route('expense.destroy', ['expense' => $a]) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a onclick="deleteExpense({{ $a->id }})" class="btn btn-sm btn-outline-danger">x</a>
                                            </form>
                                        </td>
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
