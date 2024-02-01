<ul class="list-group" id="imagesList">
    @foreach($templates as $template)
    <li class="list-group-item">
        <div class="d-flex justify-content-between align-items-top">
            <div class="text-center">
                @if ($template->logo)
                <img src="{{ asset('images/logos/' . $template->logo) }}" alt="{{ $template->logo }}" class="img-thumbnail" width="50" height="50">
                @else
                No photo
                @endif
            </div>
            <p class="card-text text-center" style="font-size: 12px;">{{ $template->logo }}</p>
        </div>
    </li>
    @endforeach
    <hr class="py-2"/>
    {!! $templates->links() !!}
</ul>