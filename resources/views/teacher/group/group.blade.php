@extends('layouts.app');
@section('content')
    <div class="container">
        <h1>Add group</h1>

        <div class="add-form">
            <form action="{{ route('group.add') }}" method="POST">
                @csrf
                <div class="form-group mt-1">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group mt-2">
                    <button class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
        <div class="all-data">
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Delete</th>
                    <th>Students</th>
                </tr>
                @foreach($groups as $key)
                    <tr>
                        <td>{{ $key->id }}</td>
                        <td>{{ $key->name }}</td>
                        <td>
                            <a href="/teacher/group/delete/{{ $key->id }}">
                                <button class="btn btn-danger">Delete</button>
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                <button type="button" class="btn btn-success mb-1" data-toggle="modal"
                                        data-target="#largeModal-{{ $key->id }}">
                                    Students
                                </button>
                                <div class="modal fade" id="largeModal-{{ $key->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="largeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="largeModalLabel">Large Modal</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Email</th>
                                                        <th>Delete</th>
                                                    </tr>
                                                    @foreach($key->users as $keys)
                                                        <tr>
                                                            <td>{{ $keys->name }}</td>
                                                            <td>{{ $keys->phone }}</td>
                                                            <td>{{ $keys->email }}</td>
                                                            <td>
                                                                @php
                                                                    $homeworks = $keys->homeworks;
                                                                    $rating=0;
                                                                    $count = 0;
                                                                    foreach($homeworks as $homework){
                                                                        if($homework['lesson']['group_id']==$key->id){
                                                                             $rating+=$homework->rating;
                                                                             $count++;
                                                                        }
                                                                    }
                                                                @endphp
                                                                @if($count!=0)
                                                                    {{ $rating/$count }}
                                                                @else
                                                                    0
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="/teacher/group/deleteStudent/{{ $keys->id }}/{{ $key->id }}">
                                                                    <button class="btn btn-danger">Delete</button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Cancel
                                                </button>
                                                <button type="button" class="btn btn-primary">Confirm</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection

