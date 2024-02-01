<div class="row">
    @foreach($templates as $template)
        <!-- Left column: Banner, Categories, Comments -->
        <div class="col-md-4">
            <!-- Banner -->
            <div class="position-relative mb-3">
                @if ($template->banner)
                    <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="100%" height="50">
                @else
                    No photo
                @endif
            </div>
        <br>

        </div>
        <!-- Right column: Header, Description, Read more -->
        <div class="col-md-8">
            <h5><a href="{{ route('templates.show', $template->id) }}" class="text-dark">{{ $template->header }}</a></h5>
            <p class="text-muted">{{ $template->created_at->format('d M, Y') }}</p>
            <p>{!! $template->description ? \Illuminate\Support\Str::limit(strip_tags($template->description), 170, $end='...') : "Blog has no content." !!}</p>

            <div>
            <ul class="list-inline">
                <li class="list-inline-item me-3">
                    <a href="javascript: void(0);" class="text-muted">
                        <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                        @if($template->category)
                            {{ $template->category->text }}
                        @else
                            General Blog
                        @endif
                    </a>
                </li>

                <li class="list-inline-item me-3">
                    <a href="javascript: void(0);" class="text-muted">
                        <i class="bx bx-comment-dots align-middle text-muted me-1"></i>
                        {{ $template->comments->count() }} Comments
                    </a>
                </li>

                <li class="list-inline-item me-3">
                    <a href="{{ route('templates.show', $template->id) }}">Read more <i class="mdi mdi-arrow-right"></i></a>
                </li>
            </ul>
            </div>

        
        </div>
        <hr class="mb-4">
    @endforeach
    {!! $templates->links() !!}
</div>