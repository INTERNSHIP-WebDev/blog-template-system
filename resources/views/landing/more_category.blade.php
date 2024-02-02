<div class="section_content">
    <div class="grid clearfix">
        <!-- Small Card Without Image -->
        @forelse ($templates as $template)
            <div class="card card_default card_small_no_image grid-item">
                <div class="card-body">
                    <img class="card-img-top" src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->header }}" width="300" height="150">
                    <div class="card-title card-title-small"><a href="{{ url('post/' . $template->id) }}">{!! $template->header ? \Illuminate\Support\Str::limit(strip_tags($template->header), 30, $end='...') : "Blog has no header" !!}</a></div>
                    <small class="post_meta">
                        <a href="#">
                            @if($template->user)
                                @php
                                $userNameWords = explode(' ', $template->user->name);
                                $firstWord = reset($userNameWords);
                                @endphp
                                {{ $firstWord }}
                            @else
                                No User
                            @endif
                        </a>
                        <span>
                            {{ $template->created_at->format('M d, Y \a\t h:i A') }}
                        </span>
                        @if($template->category)
                            <span class="category">Category: {{ $template->category->name }}</span>
                        @else
                            <span class="category">No Category</span>
                        @endif
                    </small>
                </div>
            </div>
        @empty
            <p>No blog posts found.</p>
        @endforelse
    </div>
    <div class="my-5">
        {!! $templates->links() !!}
    </div>
</div>