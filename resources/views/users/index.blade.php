@extends('app')

@section('content')
    <div>
        @foreach($query as $user)
            <p>
                User {{$user->getName()}} has an ID of {{$user->getId()}}
            </p>
        @endforeach
    </div>

@endsection