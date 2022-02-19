<div>
    @foreach($latestPosts as $post)
        <article>
            <h3>{{$post['title']}}</h3>
            <p>{{$post['content']}}</p>
        </article>
    @endforeach
</div>
