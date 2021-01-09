@extends('app')

@section('content')
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
@endsection