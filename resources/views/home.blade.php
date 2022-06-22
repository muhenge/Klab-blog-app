@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-sm-4" >
            <div class="card">
                @if(session('blog_inserted'))
                <span style="color: red">{{session('blog_inserted') }}</span>
                @endif

                @if(session('blog_not_inserted'))
                <span style="color: red">{{session('blog_not_inserted') }}</span>
                                    
                @endif

                <div class="card-body">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <button class="btn btn-success text-white" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add blog</button>
                    </div>
                    <div class="col-md-4" >
                        

                    </div>
                </div>

                <br>
                
                @foreach ($user as $item)
                <a href="ViewBlog/{{ $item->id}}" style="text-decoration:none;font-size:20px;"><div class="card-body text-center">
                        {{ $item->name}}
                </div></a><hr>
                @endforeach 
            </div>
        </div>
    </div>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="{{route('addcontent') }}">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
    </div>

    <div class="container">
      <label for="uname"><b>Title</b></label>
      <input type="text" placeholder="Enter title" name="title" value='{{old('title')}}' class="form-control" required>
      @error('title') {{ $message }}@enderror

      <label for="psw"><b>Content</b></label>
      <textarea type="text" rows="5" placeholder="typing content"  value='{{old('content')}}' name="content" required class="form-control">
      </textarea>
       @error('content') {{ $message }}@enderror
      <button type="submit">Submit</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</div>
@endsection
