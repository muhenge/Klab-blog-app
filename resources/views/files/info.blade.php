@extends('files.includes.main')
@section ('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body text-warning">

                <h4 class="mt-0 header-title  text-primary border-bottom">User Information</h4>
                

                <form  action="{{ route('user.info') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Age</label>
                        <div>
                            <input type="text" name="age" value="" class="form-control" required/>
                            <input type="hidden" name="user" value="{{ Auth::id() }}" class="form-control" required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>City</label>
                        <div>
                            <input type="text" name="city" value="" class="form-control" required/>
                        </div>
                    </div>

                    <div class="form-group m-b-0">
                        <div>
                        <button type="submit" class="btn btn-success waves-effect waves-light bg-primary">Save Information</button>
                            <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@endsection