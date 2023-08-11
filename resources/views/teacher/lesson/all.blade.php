@extends('layouts.app')
@section('content')

    <div class="container">

        <table class="table">
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Group</th>
                <th>Delete</th>
            </tr>
            @foreach($lessons as $key)
                <tr>
                    <td>{{$key->id}}</td>
                    <td>{{$key->title}}</td>
                    <td>{{$key['group']['name']}}</td>
                    <td>
                        <a href="">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>

    </div>

@endsection
