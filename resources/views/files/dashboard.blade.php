@extends('files.includes.main')
@section ('content')
    
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-4">List of Blogs</h4>
                <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0 text-primary">Add New Blog</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Save Blogs
                                            </button>
                                            <button type="reset" class="btn btn-danger waves-effect m-l-5" data-dismiss="modal" aria-label="Close">
                                                Cancel
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <center> <h4>Welcome {{$users['name']}} ,you're logged in! </h4></center>
            </div>
        </div>
    </div>
</div>
@endsection