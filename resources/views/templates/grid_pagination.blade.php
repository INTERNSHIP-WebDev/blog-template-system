<div class="row">
@foreach($templates as $template)
<div class="col-sm-4">
    <div class="card p-1 border shadow-none">
        <div class="p-3">
            <h5><a href="{{ route('templates.show', $template->id) }}" class="text-dark">{!! $template->header ? \Illuminate\Support\Str::limit(strip_tags($template->header), 19, $end='...') : "Blog has no header" !!}</a></h5>
            <p class="text-muted mb-0">{{ $template->created_at->format('d M, Y') }}</p>
        </div>
        
        <div class="position-relative">
            @if ($template->banner)
                <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="400" height="150">
            @else
                No photo
            @endif
        </div>


        <div class="p-3">
        <div class="list-inline">
            <div class="list-inline-item me-3">
                <a href="javascript:void(0);" class="text-muted">
                    <i class="bx bx-purchase-tag-alt align-middle text-muted me-1"></i>
                    @if($template->category)
                        {!! $template->category->text ? \Illuminate\Support\Str::limit(strip_tags($template->category->text), 19, $end='...') : "Blog has no header" !!}
                    @else
                        General Blog
                    @endif
                </a>
            </div>
        </div>

        <div class="list-inline">
            <div class="list-inline-item me-3">
                <a href="javascript:void(0);" class="text-muted">
                    <i class="bx bx-comment-dots align-middle text-muted me-1"></i> 
                    {{ $template->comments->count() }} Comments
                </a>
            </div>
        </div>

        <hr>

        <p class="teaser">
            {!! $template->description ? \Illuminate\Support\Str::limit(strip_tags($template->description), 19, $end='...') : "Blog has no description" !!}
        </p>


        <div>
            <a href="{{ route('templates.show', $template->id) }}" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
        </div>
    </div>
</div>

</div>

@endforeach
{!! $templates->links() !!}
</div>