@extends('layouts.base')

@section('content')
    <div>
        @forelse( $query as $user)
            <p>
                User {{ $user->getName()}}
            </p>
            <div>
                <form method="POST" action="/users/{{ $user->getId()}}/delete">
                    <input type="hidden" name="_method" value="DELETE" />
                    <input type="submit" value="DELETE">
                </form>
            </div>
        @empty
            <p>
                No users found.
            </p>
        @endforelse
    </div>

@endsection