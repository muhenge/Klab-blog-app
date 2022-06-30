<?pphp
use App\Models\article;
use App\Models\User;
use DB;
class class
?>
{{-- @extends('layouts.app') --}}
@section('content')
    @extends('layouts.header')
    @include('sweetalert::alert')
    <button type="button" class="btn btn-info btn-waves-effect waves-light float-right" data-toggle="modal"
        data-target=".bs-example-modal-center"><i class="ion-plus-circled"> Add New Blog </i></button>

    <div class="row">
        {{ Session::get('id') }}

        @foreach ($dat as $valu)
            <div class="col-md-6 col-xl-3">

                <div class="card m-b-40">
                    <div class="card-body">
                        <h5 class="card-title font-18 mt-0">{{ substr($valu->title, 0, 25) }}.</h5>

                    </div>
                    <img class="img-fluid" src="/image/{{ $valu->picture }}" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">{{ substr($valu->content, 0, 100) }}... <a
                                href=" {{ route('readMore', Crypt::encryptString($valu->id)) }}"><span
                                    class="badge badge-success badge-pill float-right">readMore</span></a>


                        <form action="{{ route('delete', Crypt::encryptString($valu->id)) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick='return confirm("Are you sure you want to delete this item?")'
                                class="btn-danger "><i class="ion-close-circled"></i></button>
                            <?php $like = DB::table('likes')
                                ->where('article_id', $valu->id)
                                ->count();
                            echo "<button class=' btn-primary'>" . $like;
                            echo '&nbsp;&nbsp;Likes</button>';
                            ?>
                        </form>


                        </p>

                    </div>
                </div>

            </div><!-- end col -->
        @endforeach

        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat m-b-30">
                <div class="p-3 bg-primary text-white">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-account-network float-right mb-0"></i>
                    </div>
                    <h6 class="text-uppercase mb-0">User Container</h6>
                </div>
                <div class="card-body">
                    <a href="javascript:void(0);" class="waves-effect"> <span> List of User ></span> <span
                            class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    @foreach ($data as $value)
                        <ul class="list-unstyled">

                            <form method="POST"> <a class="dropdown-item"
                                    href="{{ route('articleList', Crypt::encryptString($value->id)) }}">
                                    {{ $value->name }}

                                    @csrf
                                    @method('post')

                            </form></a>

                            <a href="#" class="card-link">
                                
                                
                                flowing</a>
                            <a href="#" class="card-link">unflowing</a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- end row -->
    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Article Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="{{ 'registerArticle' }}" method='POST' enctype="multipart/form-data">

                        @csrf
                        <div class="form-group">
                            <label>Title</label>
                            <div>
                                <input type='hidden' name='user_id' value="{{ Auth::user()->id }}">
                                <textarea class="form-control" rows="2" name='title'></textarea>
                                <span class="text-danger">
                                    @error('title')
                                        {{ $message . old('title') }}
                                    @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <div>
                                <textarea required class="form-control" rows="4" name='content' id='elm1'></textarea>
                                <span class="text-danger">
                                    @error('content')
                                        {{ $message . old('content') }}
                                    </span>
                                @enderror
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Content Picture</label>
                            <div>
                                <input type='file' name='picture'class='form-cotroller'>
                                <span class="text-danger">
                                    @error('picture')
                                        {{ $message . old('picture') }}
                                    </span>
                                @enderror
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    <i class="fa fa-save" aria-hidden="true">Save</i>
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
