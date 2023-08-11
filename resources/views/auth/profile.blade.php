@extends('layouts.app')
@section('content')

    <div>
        <div class="d-flex justify-content-center">
            <div class="col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Անձնական տվյալներ</strong>
                    </div>
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label class=" form-control-label">Հեռախոսահամար</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                                    <input class="form-control" name="phone" value="{{ Auth::user()['phone'] }}">
                                </div>
                                <small class="form-text text-muted">ex. (094) 777777</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Էլ-հասցե</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input class="form-control" disabled name="email" value="{{ Auth::user()['email'] }}">
                                </div>
                                <small class="form-text text-muted">ex. info@test.am</small>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Պրոֆիլի նկար</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input class="form-control" type="file" name="file" value="{{ Auth::user()['email'] }}">

                                </div>
                                <div class="my-2">
                                    @if(Auth::user()['avatar']!=null)
                                        <img src="{{ asset('storage/'.Auth::user()['avatar']) }}" style="width:150px" alt="">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info">Փոփոխել</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
