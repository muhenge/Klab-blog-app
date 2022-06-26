@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('articlesStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
            
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Title</label>
                            <div class="col-md-6">
                                <input type="hidden" value="{{ $user }}" class="form-control" name="user_id">                               
                                <input type="text" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror" name="title">                               
                            </div>
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Photo</label>
                            <div class="col-md-6">                             
                                <input type="file" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror" name="photo">                               
                            </div>
                            @error('photo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="row mb-3">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Content</label>
                            <div class="col-md-6">
                                <textarea name="content" cols="30" rows="6" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                            </div>
                            @error('content')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        </div>
            
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-success">Register</button>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
