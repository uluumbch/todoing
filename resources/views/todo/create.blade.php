@extends('layout')

@section('content')
    <h1>add Todo List</h1>
    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('todos.store') }}" method="post">
        @csrf
        <input type="text" name="title" id="title" class="input input-bordered w-full" placeholder="Enter todo title">
        <br>
        <textarea name="description" id="description" cols="30" rows="10" class="textarea textarea-bordered"  placeholder="Enter todo description"></textarea>
        <br>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>
@endsection