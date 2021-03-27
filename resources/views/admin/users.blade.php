@extends('layouts.admin')

@push('scripts')
    <script src="{{ asset('js/block-user.js') }}" defer></script>
@endpush

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><strong>Users Table</strong></div>


                    <table class="table table-hover table-bordered">
                        <tr class="success">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td><p>{{ $user->id }}</p></td>
                                <td><p>{{ $user->name }}</p></td>
                                <td><p>{{ $user->email }}</p></td>
                                <td>
                                    <div class="form-group">
                                        <div
                                            class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                            <input type="checkbox" class="custom-control-input"
                                                   @if($user->status == 'active') checked
                                                   @endif  id="{{ $user->id }}">
                                            <label class="custom-control-label blocking-user"
                                                   data-id="{{ $user->id }}" data-status="{{ $user->status }}"
                                                   for="{{ $user->id }}"></label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="text-center">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
