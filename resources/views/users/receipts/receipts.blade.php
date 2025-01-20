@extends('users.user_layout')

@section('user_content')

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Receipts of <strong>{{ $user->name }}</strong></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Note</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>User</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Note</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($user->receipts as $receipt)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $receipt->date }}</td>
                                    <td>{{ $receipt->amount }}</td>
                                    <td>{{ $receipt->note }}</td>
                                    <td class="text-right">

                                        <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST">
                                            {{-- just for design --}}
                                            <a class="btn-sm btn btn-warning"
                                                href="{{ route('users.show', ['user' => $user->id]) }}"><i
                                                    class="fa fa-eye"></i></a>
                                            {{-- ends --}}
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Are you want to sure?')" type="submit"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

@endsection
