<div class="row" id="imagesRow">
    @foreach($templates as $template)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="text-center">
                @if ($template->logo)
                <img src="{{ asset('images/logos/' . $template->logo) }}" alt="{{ $template->logo }}" class="img-thumbnail" width="150" height="150">
                @else
                No photo
                @endif
            </div>
        </div>
    </div>
    @endforeach
    <hr class="py-2" />
    {!! $templates->links() !!}
</div>