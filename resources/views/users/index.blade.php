@extends('layouts.base')

@section('content')
    <div>
        @forelse($query as $user)
            <p>
                User {{$user->getName()}} has an ID of {{$user->getId()}}
            </p>
        @empty
            <p>
                No users found.
            </p>
        @endforelse
    </div>

@endsection