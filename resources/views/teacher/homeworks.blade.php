@extends('layouts.app')
@section('content')

    <div class="container">

        <table class="table">
            <tr>
                <th>Id</th>
                <th>Lesson Title</th>
                <th>Group</th>
                <th>Rating</th>
                <th>Delete</th>
                <th>Rating</th>
            </tr>
            @foreach($homeworks as $key)
                <tr>
                    <td>{{$key->id}}</td>
                    <td>{{$key['lesson']['title']}}</td>
                    <td>{{$key['lesson']['group']['name']}}</td>
                    <td>{{$key['rating']}}</td>
                    <td>
                        <a href="">
                            <button class="btn btn-danger">Ջնջել</button>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-success mb-1" data-toggle="modal"
                                data-target="#largeModal-{{ $key->id }}">
                            Գնահատել
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
                                        <form action="{{ route('homeworks.rating') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $key->id }}">
                                            <div class="my-2">
                                                <label for="">Գնահատական</label>
                                                <input type="text" placeholder="1-10" name="rating" class="form-control">
                                            </div>
                                            <div>
                                                <button class="btn btn-success">Գնահատել</button>
                                            </div>
                                        </form>
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
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection
