@extends('layouts.app');
@section('content')
    <div class="container">
        <h1>Invite User</h1>

        <div class="add-form">
            <form action="{{ route('invite.add') }}" method="POST">
                @csrf
                <div class="form-group mt-1">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group mt-1">
                    <label for="">Group</label>
                    <select name="group_id" id="" class="form-control">
                        @foreach($groups as $key)
                            <option value="{{ $key->id }}">{{ $key->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection

