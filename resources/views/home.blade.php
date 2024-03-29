@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <p><a href="{{ url('/tasks') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Tasks</a></p>
                    <p><a href="{{ url('/news') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">News</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
