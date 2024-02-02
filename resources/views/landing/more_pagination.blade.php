<div class="section_content">
    <div class="grid clearfix">
        <!-- Small Card Without Image -->
        @foreach ($more as $post)
            <div class="card card_default card_small_no_image grid-item">
                <div class="card-body">
                    <img class="card-img-top" src="{{ asset('images/banners/' . $post->banner) }}" alt="{{ $post->header }}" width="300" height="150">
                    <div class="card-title card-title-small"><a href="{{ url('post/' . $post->id) }}">{!! $post->header ? \Illuminate\Support\Str::limit(strip_tags($post->header), 30, $end='...') : "Blog has no header" !!}</a></div>
                    <small class="post_meta"><a href="#">
                            @if($post && $post->user)
                            @php
                            $userNameWords = explode(' ', $post->user->name);
                            $firstWord = reset($userNameWords);
                            @endphp
                            {{ $firstWord }}
                        </a>
                        <span>
                            {{ $post->created_at->format('M d, Y \a\t h:i A') }}
                        </span>
                        @else
                        <span class="date">No User</span>
                        @endif
                    </small>
                </div>
            </div>
        @endforeach
    </div>
    <div class="my-5">
    {!! $more->links() !!}
    </div>
</div>