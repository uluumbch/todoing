@extends('layout')

@section('content')
    <h1>Todo List</h1>
    <p>
        {{ auth()->user()->name }} | {{ auth()->user()->getRoleNames()->first() }}
    </p>
    <form action="" method="get" class="mt-3">
        <div class="join">
            <div>
                <div>
                    <input class="input input-bordered join-item" placeholder="Search" name="q" value="{{ request('q') }}"/>
                </div>
            </div>
            <div class="indicator">
                <button type="submit" class="btn btn-accent join-item">Search</button>
                {{-- <button type="submit" class="btn btn-accent join-item">Search</button> --}}
                @role('admin')
                <a class="join-item btn btn-primary" href="{{ route('todos.create') }}">Create Todo</a>
                @endrole
                {{-- atau --}}
                {{-- @can('create', 'App\Models\Todo')
                <a class="join-item btn btn-primary" href="{{ route('todos.create') }}">Create Todo</a>
                @endcan --}}
            </div>
        </div>
    </form>
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