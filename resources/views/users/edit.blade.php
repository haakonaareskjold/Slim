@extends('layouts.base')

@section('content')
    <div>
        <form method="POST" action="/users/{$query->id}">
            @method('PUT')
            <label for="name">Name:</label>
            <br>
            <input type="text" id="name" name="name">
            <br>
            <input type="submit" value="Submit">
        </form>
    </div>
@endsection