@extends('layouts.app')

    @section('bold_text')
    Section 6 : Request To  (API : Section 5)
    @endsection

        @section('content')
        @include('inc.success')
            <div class="card m-2 p-2">
            @if(count($lists)>0)
                @foreach($lists as $list)
                <div class="list-group">
                    <a href="request/{{$list->id}}/edit" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$list->id}} : {{$list->name}}</h5>
                        <small>Last Update:{{ \Carbon\Carbon::parse($list->updated_at)->diffForHumans() }}</small>
                        </div> 
                        <p class="mb-1">Country : {{$list->country}} </p>
                        <small>Age : {{$list->age}} </small>
                    </a>
                    <div class="col-2">
                        <form action="/request/{{$list->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                        <button type="submit" class="btn btn-danger">Danger</button>
                        </form>
                    </div>
                </div>
                @endforeach
            @else
            <p>There is nothing yet! or GuzzleException</p>
            @endif

            </div>
        @endsection