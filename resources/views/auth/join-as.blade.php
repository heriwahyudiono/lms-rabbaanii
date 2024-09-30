@extends('auth.layouts.app')

@section('join-as')
    <div>
        <h2 class="text-3xl font-bold underline">Who are you?</h2>
        <form method="POST" action="{{ route('join-as') }}">
            @csrf 
            <select name="role" id="role">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
            </select>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection