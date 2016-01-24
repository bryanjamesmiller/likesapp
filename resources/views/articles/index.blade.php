@extends('_layout')

@section('content')
    @foreach($articles as $article)
        <div class="jumbotron header_bottom">
            <h1>{{$article->title}}</h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p>{{$article->description}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <span class="liked_btn">
                    <button class="btn btn-default vote_btn"><span class="number">{{$article->likes}}</span>&nbsp;Likes
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
                var url = "/button";
                var $post = {};
                var newNum = parseInt($(this).find(".number").text()) + 1;
                var articleID = parseInt($(this).find(".article_id").text());
                console.log(articleID);
                $post.size = newNum;
                $post.id = articleID;
                $(this).parent().html('<button id="vote" class="btn btn-success">' + newNum + ' Liked!</button>');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: $post,
                    cache: false,
                    success: function(data){
                        return data;
                    }
                });
            });
        });
    </script>
@stop