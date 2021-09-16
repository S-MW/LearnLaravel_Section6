@extends('layouts.app')

    @section('bold_text')
    Section 6 : Request
    @endsection

        @section('content')
            <div class="card m-2 p-2">
            @if(count($lists)>0)
                @foreach($lists as $list)
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action">
                        <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">{{$list->id}} : {{$list->name}}</h5>
                        <small>Last Update:{{ \Carbon\Carbon::parse($list->updated_at)->diffForHumans() }}</small>
                        </div> 
                        <p class="mb-1">Country : {{$list->country}} </p>
                        <small>Age : {{$list->age}} </small>
                    </a>
                </div>
                @endforeach
            @else
            <p>There is nothing yet!</p>
            @endif

            </div>
        @endsection