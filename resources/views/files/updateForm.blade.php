@extends('files.includes.main')
@section ('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body  text-success">

                <h4 class="mt-0 header-title text-primary border-bottom">Change Blog</h4>
                <form action="{{ route('blog.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <lebel>Title</lebel>
                        <input type="text" class="form-control" value="{{ $results->title }}" name="title" id="">
                        <input type="hidden" name="id" value="{{ $results->id }}">
                    </div>
                    <div class="form-group">
                        <lebel>Image</lebel>
                        <img src="{{ asset($results->image)}}" width="50" height="50" alt="">
                        <input type="file" name="image" id="">
                    </div>
                    <div class="form-group">
                        <lebel>Content</lebel>
                        <textarea id="elm1" name="area"><?=$results->content?></textarea>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                Save change
                            </button>
                        </div>
                        <div></form><form action="{{ route('blog.delete')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $results->id }}">
                            <button type="submit" class="btn btn-danger waves-effect waves-light">
                                Delete Blog
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection