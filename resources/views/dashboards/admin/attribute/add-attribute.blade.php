@extends('layouts.app')

@section('content')
    <a href="{{url('admin/add-attribute-value')}}" class="btn btn-primary">Add Attribute Value</a>
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

                        <h1>Add Attribute</h1>


                        <form action="{{url('admin/add_attribute')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="attribute_name" class="control-label">Attribute Name</label>
                                <input type="text" class="form-control @error('attribute_name') is-invalid @enderror" name="attribute_name" placeholder="Attribute name" value="{{old('attribute_name')}}">
                                @error('attribute_name')
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

