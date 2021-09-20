@extends('layouts.app')

    @section('bold_text')
    Section 6 : Insert new record through API
    @endsection

@section('content')
    @include('inc.error')
    <form action="/request" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Country</label>
            <select id="country" name="country" class="form-select form-select-sm" aria-label=".form-select-sm example">
                <option disabled selected >Open this select menu</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Qatar">Qatar</option>
                <option value="UAE">UAE</option>
                <option value="Oman">Oman</option>
                <option value="Yaman">Yaman</option>
            </select>       
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection