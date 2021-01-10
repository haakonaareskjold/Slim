@extends('app')

@section('content')
    @if (!empty($query))
    <div>
        <p>
            My name is {{$query->getName()}}
        </p>
    </div>
    <div>
        <p>
            My ID is {{$query->getId()}}
        </p>
    </div>
    @else
    <p>
        Users with this ID does not exist.
    </p>
    @endif
@endsection