@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add Lesson</h1>
        <div class="add-form">
            <form action="{{ route('lessons.add') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-group mt-1">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" value="{{ old('title') }}">
                    @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-1">
                    <label for="content">Content</label>
                    <textarea name="content" id="editor" class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}">{{ old('content') }}</textarea>
                    @error('content')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="group_id">Group</label>
                    <select name="group_id" id="group_id" class="form-control{{ $errors->has('group_id') ? ' is-invalid' : '' }}">
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}"{{ old('group_id') == $group->id ? ' selected' : '' }}>{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @error('group_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="file">Choose file</label>
                    <input type="file" name="file" id="file" class="form-control{{ $errors->has('file') ? ' is-invalid' : '' }}">
                    @error('file')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
