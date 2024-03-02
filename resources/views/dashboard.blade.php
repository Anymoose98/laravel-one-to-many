@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body d-flex flex-wrap ">
                    
                    
                        {{ session('status') }}
                        <a href="{{ route('admin.posts.index') }}">Per vedere tutti post clicca qui</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
