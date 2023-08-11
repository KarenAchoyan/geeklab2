@extends('layouts.app')
@section('content')

    <div class="content">
        <div class="row">

            @foreach($groups as $key)
                <div class="col-md-4">
                    <aside class="profile-nav alt">
                        <section class="card">
                            <div class="card-header user-header alt bg-dark">
                                <div class="media">
                                    <div class="media-body">
                                        <h2 class="text-light display-9 text-center">{{ $key['group']['name'] }}</h2>
                                        <p class="text-center">{{ $key['group']['user']['name'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">

                                <li class="list-group-item">
                                    <a style="color: black" href="/student/lessons/{{ $key['group']['id'] }}"> <i class="fa fa-tasks"></i>
                                        Դասեր <span
                                            class="badge badge-danger pull-right">{{ count($key['group']['lessons']) }}</span></a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#" style="color: black"> <i class="fa fa-star"></i> Գնահատական <span
                                            class="badge badge-success pull-right">
                                             @php
                                                 $homeworks = Auth::user()->homeworks;
                                                 $rating=0;
                                                 $count = 0;
                                                 foreach($homeworks as $homework){
                                                     if($homework['lesson']['group_id']==$key->group_id){
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
                                        </span></a>
                                </li>

                            </ul>

                        </section>
                    </aside>
                </div>
            @endforeach
        </div>
    </div>

@endsection
