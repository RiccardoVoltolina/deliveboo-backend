@extends('admin.products.sidebar')

@section('content')
<?php


?>
<div class="container del_yellow">
    <h2 class="fs-4 text-light my-4">
        {{ __('Dashboard') }}
    </h2>
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}

                    
                    <div class=" my-5 d-flex justify-content-center" >
                      <div class="col-6">
                         <img src="{{$restaurants->cover_image}}" class="card-img-top w-75 m-auto" alt="...">
                      </div>
                     
                      <div class="col-6">
                      <h3 class="self-align-center">{{$restaurants->name}}</h3>
                        <h6 class="">Indirizzo: {{$restaurants->address}}</h6>
                      
                      </div>
                    </div>
                        

                        
                        <div class="">
                            <img class="w-75" src="" alt="" srcset="">
                        </div>
                        
                        



                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
