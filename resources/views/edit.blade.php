@extends('layouts.app')

    @section('bold_text')
    Section 6 : Edit The record through API
    @endsection

@section('content')
    @include('inc.error')
    <form action="/request/{{$lists->data->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$lists->data->name}}">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" value="{{$lists->data->age}}">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <select id="country" name="country" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option disabled selected >Open this select menu</option>
                <option value="Saudi Arabia" @if($lists->data->country == 'Saudi Arabia') selected @endif >Saudi Arabia</option>
                <option value="Kuwait"@if($lists->data->country == 'Kuwait') selected @endif>Kuwait</option>
                <option value="Bahrain"@if($lists->data->country == 'Bahrain') selected @endif>Bahrain</option>
                <option value="Qatar"@if($lists->data->country == 'Qatar') selected @endif>Qatar</option>
                <option value="UAE"@if($lists->data->country == 'UAE') selected @endif>UAE</option>
                <option value="Oman"@if($lists->data->country == 'Oman') selected @endif>Oman</option>
                <option value="Yaman"@if($lists->data->country == 'Yaman') selected @endif>Yaman</option>
            </select>       
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection