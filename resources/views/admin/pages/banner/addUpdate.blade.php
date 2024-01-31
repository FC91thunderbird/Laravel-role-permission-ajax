@extends('main')

@section('content')
<div class="row">
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0"> @if(isset($banner)) Edit @else Add @endif Banner</h5>
                <a href="{{ route('banner.index') }}" class="btn btn-sm btn-primary float-end"> Back </a>
            </div>
            <div class="card-body">
                @if (isset($banner))
                {!! Form::model($banner, ['method'=>'PUT', 'route'=> ['banner.update', $banner->id], 'enctype'=>'multipart/form-data', 'class'=> 'row g-3']) !!}
                @else
                {!! Form::open(['method'=>'post', 'route'=>['banner.store'], 'enctype'=>'multipart/form-data', 'class'=> 'row g-3']) !!}
                @endif
                <div class="col-12">
                    <label class="form-label"> Name</label>
                    {!! Form::text('name', old('name', $banner->name ?? ''), [
                    'class' => 'form-control ' . ($errors->has('name') ? 'is-invalid' : ''),
                    'placeholder' => 'Enter a Banner name']) !!}
                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12">
                    <label class="form-label"> Image</label>
                    {!! Form::file('image', null, [
                    'class' => 'form-control ' ]) !!}
                    
                     @if(isset($banner))
                        <img src="{{ asset('/banner/'.$banner->image) }}" alt="{{ $banner->name }}" height="150" class="d-block ms-0  rounded mt-2">
                    @endif
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-12 ">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    <button type="reset" class="btn btn-sm btn-label-secondary">Cancel</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection