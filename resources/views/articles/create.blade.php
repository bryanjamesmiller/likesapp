@extends('_layout')

@section('content')
<div class="text-center header_bottom">
    <h1 class="bg-info header_size">Create an Article</h1>
</div>
<form method="POST" action="/article">

    <div class="well">

        <div class="row">
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="form-group">
                    <label for="title">Article Title</label>
                    <input type="text" name="title" class="form-control" value="" >
                </div>

                <div class="form-group">
                    <label for="likes">Starting number of "Likes":</label>
                    <input name="likes" class="form-control" type="number">
                </div>

                <div class="form-group">
                    <label for="description">Article Description:</label>
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <hr>
        </div>

        <div class="col-xs-12 text-center">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit Article</button>
            </div>
        </div>
    </div>
    
</form>
@stop

@section('scripts.footer')
@stop