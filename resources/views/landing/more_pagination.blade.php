<div class="row">
    @foreach ($more as $post) 
    <div class="col-6">
        <div class="card" style="width: 80%;">
            <img class="card-img-top" src="{{ asset('images/banners/' . $post->banner) }}" alt="{{ $post->header }}" height="100px">
            <div class="card-body text-center">
                <h5 class="card-title text-center text-dark">{{ $post->header }}</h5>
                <a href="{{ url('post/' . $post->id) }}" class="btn btn-outline btn-sm btn-dark text-center">Read More</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="my-5">
{!! $more->links() !!}
</div>
