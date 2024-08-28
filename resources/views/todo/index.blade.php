@extends('layout')

@section('content')
    <h1>Todo List</h1>
    <a class="btn btn-primary" href="{{ route('todos.create') }}">Create Todo</a>
    
    <div class="join">
        <div>
          <div>
            <input class="input input-bordered join-item" placeholder="Search" />
          </div>
        </div>
        <select class="select select-bordered join-item">
          <option disabled selected>Filter</option>
          <option>Sci-fi</option>
          <option>Drama</option>
          <option>Action</option>
        </select>
        <div class="indicator">
          <button type="submit" class="btn btn-accent join-item">Search</button>
        </div>
      </div>
    <ul>
        @forelse ($todos as $todo)
            <li class="list-decimal my-3">
                {{ $todo->title }}
                
                <form action="{{ route('todos.complete', $todo->id) }}" method="post" class="inline">
                    @csrf
                    <button class="btn btn-success text-white" type="submit">Selesai</button>
                </form>
            </li>
        @empty
            <li>No todo found</li>
        @endforelse
    </ul>

    <div class="divider">DONE</div>
    <ul>
        @forelse ($done as $todo)
            <li class="list-decimal my-3">
                {{ $todo->title }}
                {{-- destroy --}}
                <form action="{{ route('todos.destroy', $todo->id) }}" method="post" class="inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-error" type="submit">Delete</button>
                </form>
            </li>
        @empty
            <li>No todo found</li>
        @endforelse
    </ul>
@endsection