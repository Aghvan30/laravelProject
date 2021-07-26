@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('danger'))
                            <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @endif

                        <h1>{{__('messages.add_attribute_value')}}</h1>

                        <form action="{{url('admin/add_attribute_value')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="attribute_name" class="control-label">Attribute Name</label>
                                <input type="text" class="form-control  @error('attribute_value') is-invalid @enderror" name="attribute_value" placeholder="Attribute Value" value="{{old('attribute_value')}}">
                                @error('attribute_value')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="attribut" class="control-label">Attribute</label>
                                <select  name='attribute' class="form-control">
                                    <option value="">Attribut</option>
                                    @if(!empty($attrVal))
                                        @foreach($attrVal as $val)
                                    <option value="{{$val->id}}">{{$val->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="attribute_name" class="control-label">icon</label>
                                <input type="text" class="form-control  @error('icon') is-invalid @enderror" name="icon" placeholder="Icon" value="{{old('icon')}}">
                                @error('icon')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


