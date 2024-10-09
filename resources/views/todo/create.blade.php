@extends('layout')

@section('content')
    <h1 class="font-bold text-2xl">add Todo List</h1>
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
        <div class="mb-3">
            <input type="text" name="title" id="title" class="input input-bordered w-full" placeholder="Enter todo title">
        </div>
        <div class="mb-3">
            <textarea name="description" id="description" class="textarea textarea-bordered w-full"  placeholder="Enter todo description"></textarea>
        </div>
        <button class="btn btn-primary" type="submit">Create</button>
    </form>
@endsection