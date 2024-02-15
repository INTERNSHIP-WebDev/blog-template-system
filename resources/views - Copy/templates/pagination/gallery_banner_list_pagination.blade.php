<ul class="list-group" id="imagesList">
    @foreach($templates as $template)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-center">
                <div class="list-image-container">
                    @if ($template->banner)
                        <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="100%" height="100%">
                    @else
                        <div class="no-photo">No photo</div>
                    @endif
                </div>
                <p class="card-text text-center mt-2" style="font-size: 12px;">{{ $template->banner }}</p>
            </div>
        </li>
    @endforeach
    <hr class="my-2" />
    {!! $templates->links() !!}
</ul>
