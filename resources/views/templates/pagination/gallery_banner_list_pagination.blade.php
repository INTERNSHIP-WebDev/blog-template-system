<ul class="list-group" id="imagesList">
    @foreach($templates as $template)
        <li class="list-group-item">
            <div class="d-flex justify-content-between align-items-top">
                <div class="text-center">
                    @if ($template->banner)
                    <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="50" height="50">
                    @else
                    No photo
                    @endif
                </div>
                <p class="card-text text-center" style="font-size: 12px;">{{ $template->banner }}</p>
            </div>
        </li>
    @endforeach
    <hr class="py-2"/>
    {!! $templates->links() !!}
</ul>