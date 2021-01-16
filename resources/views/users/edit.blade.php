@extends('layouts.base')

@section('content')
    <h1>Update users' name</h1>
    <div>
        <form method="POST" action="/users/{{ $query->getId() }}" enctype="application/x-www-form-urlencoded">
            <label for="name">Name:</label>
            <br>
            <input type="text" id="name" name="name" value="{{$query->getName()}}">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection