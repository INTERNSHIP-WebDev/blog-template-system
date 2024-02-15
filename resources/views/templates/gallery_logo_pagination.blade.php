<div class="row" id="imagesRow">
    @foreach($templates as $template)
    <div class="col-md-4 mb-4">
        <div class="card">
            <div class="position-relative">
                <div class="image-container">
                    @if ($template->logo)
                    <img src="{{ asset('images/logos/' . $template->logo) }}" alt="{{ $template->logo }}" class="img-thumbnail" width="100%" height="100%">
                    @else
                    No photo
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <hr class="py-2" />
    {!! $templates->links() !!}
</div>
