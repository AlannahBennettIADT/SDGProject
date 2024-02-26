<!-- index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Profile Information</div>

                    <div class="card-body">
                        <p>Name: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        @if($roles->isNotEmpty())
                            <p>Roles:
                                <ul>
                                    @foreach($roles as $role)
                                        <li>{{ $role->name }}</li>
                                    @endforeach
                                </ul>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection