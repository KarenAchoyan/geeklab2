@extends('layouts.app')
@section('content')

    <div class="container">

        <table class="table">
            <tr>
                <th>Id</th>
                <th>Lesson Title</th>
                <th>Group</th>
                <th>Rating</th>
            </tr>
            @foreach($homeworks as $key)
                <tr>
                    <td>{{$key->id}}</td>
                    <td>{{$key['lesson']['title']}}</td>
                    <td>{{$key['lesson']['group']['name']}}</td>
                    <td>{{$key['rating']}}</td>
{{--                    <td>--}}
{{--                        <a href="">--}}
{{--                            <button class="btn btn-danger">Ջնջել</button>--}}
{{--                        </a>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
        </table>

    </div>

@endsection
