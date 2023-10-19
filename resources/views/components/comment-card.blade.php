

@foreach($comments as $comment)
    <div class="single_comment_area">
    <div class="comment-content d-flex" @if($comment->parent_id != null) style="margin-left:40px;" @endif>
        <div class="comment-author">
            <img src="{{asset('/storage/'.$comment->user->profile_picture)}}" alt="author">
        </div>
        <div  class="comment-meta">
            <a href="#" class="post-date">{{$comment->created_at->format('M d')}}</a>
            <p><a href="#" id="author-name" class="post-author">{{$comment->user->first_name}} {{$comment->user->last_name}}</a></p>
            <p>{{$comment->comment}}</p>
            <a href="#comment-form" class="comment-reply" onclick="replyTo({{$comment->id}})" >Reply</a>
            <input type="hidden"   value="{{$comment->id}}">
            @auth
                @if($comment->user->id == auth()->user()->id)
                    <form action="/delete-comment" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="id" id="comment-id" value="{{$comment->id}}">
                            <button class="comment-reply empty-btn">Delete</button>
                        </form>
                @endif
            @endauth
        </div>
    </div>
{{--        {{$replies = ($comment->replies->count() ? $replies : null)}}--}}
        <x-comment-card :comments="$comment->replies"/>
    </div>
@endforeach


