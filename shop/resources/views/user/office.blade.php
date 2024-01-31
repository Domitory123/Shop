@extends('layouts.app')

@section('content')

<h1>Особистий кабінет</h1>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">User Information</h5>

            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" value="{{auth()->user()->name}}" readonly>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" value="{{auth()->user()->email}}" readonly>
            </div>
        </div>
    </div>
</div>


@endsection


