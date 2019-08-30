@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Категории</div>

                    <div class="card-body">

                        @foreach($all as $one)
                            <div class="one_cat"><a href="{{asset('parse/category/'.$one->id)}}">{{$one->name}}</a>
                            </div>

                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection