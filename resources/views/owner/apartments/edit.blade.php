@extends('layouts.app')
@section('title')
    Edit an apartment | BoolBnB
@endsection
@include('partials.header')
@section('content')
<div class="container kp--cta">
    <div class="row justify-content-center">
        <div class="col-xs-12 col-md-8 col-lg-8">
            {{-- <div class="card"> --}}
                <form class="" action="{{route('owner.apartments.update', $apartment->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <h4>Apartment info</h4>
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{$apartment->title}}">
                    </div>
                    @error('title')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <label for="address">Address</label>
                    <div>
                        <input type="search" id="address-input" class="form-control" placeholder="Address" />
                        <input type="text" name="latitude" value="{{$apartment->latitude}}" id='latitude' style="display: none;">
                        <input type="text" name="longitude" value="{{$apartment->longitude}}" id='longitude' style="display: none;">
                    </div>
                    @error('latitude')
                    <div class="alert alert-danger">Invalid address</div>
                    @enderror
                    <div class="kp--nr-forms kp--form-group">
                        <div class="form-group kp--form-group">
                            <label for="number_rooms">Number of rooms</label>
                            <input type="number" name="number_rooms" class="form-control" value="{{$apartment->number_rooms}}">
                        </div>
                        @error('number_rooms')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="form-group kp--form-group">
                            <label for="number_beds">Number of beds</label>
                            <input type="number" name="number_beds" class="form-control" value="{{$apartment->number_beds}}">
                        </div>
                        @error('number_beds')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="form-group kp--form-group">
                            <label for="number_bathrooms">Number of bathrooms</label>
                            <input type="number" name="number_bathrooms" class="form-control" value="{{$apartment->number_bathrooms}}">
                        </div>
                        @error('number_bathrooms')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror

                        <div class="form-group kp--form-group">
                            <label for="sqmt">Square meters</label>
                            <input type="number" name="sqmt" class="form-control" value="{{$apartment->sqmt}}">
                        </div>
                        @error('sqmt')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>



                    <div class="form-group kp--services">
                        <h4>Services</h4>
                        @foreach($services as $service)
                            <label for="services-{{$service->id}}">{{$service->service_name}}</label>
                            <input id="services-{{$service->id}}" type="checkbox" name="services[]" value="{{$service->id}}"
                            @foreach ($apartment->services as $ap_service)
                                @if ($service->id == $ap_service->id)
                                    checked
                                @endif
                            @endforeach
                            >
                        @endforeach
                    </div>




                    <div>
                        <h4>Published</h4>
                        <label for="pub">Published</label>
                        <input type="radio" id="published" name="published" value="1" {{($apartment->published == 1) ? 'checked' : ''}}>
                        <label for="not-pub">Not Published</label>
                        <input type="radio" id="not-published" name="published" value="0" {{($apartment->published == 0) ? 'checked' : ''}}>
                    </div>

                    {{-- <form action="/upload" method="post" enctype="multipart/form-data"> --}}
                        {{-- @csrf --}}
                        <div class="form-group">
                            <label id="gv-image" for="image">Image</label>
                            <input id="gv-input-image" type="file" name="image" class="form-control btn" value="{{old('image')}}">
                        </div>
                    {{-- </form> --}}
                    @error('image')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror

                    <input type="submit" value="Salva" class="btn btn-primary kp--btn">
                </form>




            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
