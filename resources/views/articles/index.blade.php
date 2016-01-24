@extends('_layout')

@section('content')
    @foreach($articles as $article)
        <div class="text-center header_bottom">
            <h1 class="bg-info header_size">{{$article->title}}</h1>
        </div>

        <div class="row">
            <div class="col-xs-12">
                <p>{{$article->description}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <span class="liked_btn">
                    <button class="btn btn-success vote_btn">
                        <span class="glyphicon glyphicon-thumbs-up"></span>&nbsp;
                        <span class="oldNumLikes">{{$article->likes}}</span>&nbsp;Likes
                        <span class="article_id">{{$article->id}}</span>
                    </button>
                </span>
            </div>
        </div>
        <hr>
    @endforeach
@stop

@section('scripts.footer')
    <script>
        $(document).ready(function(){

            $('.vote_btn').click(function(e) {
                var newNumLikes = parseInt($(this).find(".oldNumLikes").text()) + 1;
                var article_id = parseInt($(this).find(".article_id").text());

                var $post = {};
                $post.likes = newNumLikes;
                $post.id = article_id;
                $(this).parent().html('<button id="vote" class="btn btn-primary"><span class="glyphicon glyphicon-ok-circle"></span>&nbsp;' + newNumLikes + ' Liked!</button>');

                $.ajax({
                    type: "POST",
                    url: "/button",
                    data: $post
                });
            });
        });
    </script>
@stop