@extends('layouts.app')
@section('content')

    <div class="content">
        <div class="row">
            @if(count($lessons)>0)
                @foreach($lessons as $key)
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ $key->title }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                               href="#nav-home" role="tab" aria-controls="nav-home"
                                               aria-selected="true">Դասը</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                               href="#nav-profile" role="tab" aria-controls="nav-profile"
                                               aria-selected="false">Ուղարկել տնային</a>
{{--                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab"--}}
{{--                                               href="#nav-contact" role="tab" aria-controls="nav-contact"--}}
{{--                                               aria-selected="false">Contact</a>--}}
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                             aria-labelledby="nav-home-tab">
                                            <div class="my-4">
                                                {!! $key->content !!}
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                             aria-labelledby="nav-profile-tab">
                                            @if(count($key['homework'])==0)
                                                <form action="{{ route('homeworks.add') }}"
                                                      enctype="multipart/form-data"
                                                      method="POST">
                                                    @csrf
                                                    <input type="hidden" name="lesson_id" value="{{ $key->id }}">
                                                    <div class="my-2">
                                                        <label for="">Choose homework</label>
                                                        <input type="file" class="form-control" name="homework">
                                                    </div>
                                                    <button class="btn btn-primary">Add</button>
                                                </form>
                                            @else
                                                <div class="my-5">
                                                    <h4>Ձեր տնային աշխատանքը արդեն ուղարկված է</h4>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                             aria-labelledby="nav-contact-tab">
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt
                                                tofu
                                                stumptown aliqua, retro synth master cleanse. Mustache cliche tempor,
                                                williamsburg carles vegan helvetica. Reprehenderit butcher retro
                                                keffiyeh
                                                dreamcatcher synth. Cosby sweater eu banh mi, irure terry richardson ex
                                                sd.
                                                Alip
                                                placeat salvia cillum iphone. Seitan alip s cardigan american apparel,
                                                butcher
                                                voluptate nisi .</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <h3 class="text-center">Դեռ տեղադրված դաս չկա</h3>
            @endif
        </div>
        {{ $lessons->links() }}
    </div>

@endsection
