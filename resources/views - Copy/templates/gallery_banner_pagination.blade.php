<div class="row" id="imagesRow">
    @foreach($templates as $template)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="position-relative">
                    <div class="image-container">
                        @if ($template->banner)
                            <img src="{{ asset('images/banners/' . $template->banner) }}" alt="{{ $template->banner }}" class="img-thumbnail" width="100%" height="100%">
                        @else
                            <div class="no-photo">No photo</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <hr class="my-2" />
    {!! $templates->links() !!}
</div>
