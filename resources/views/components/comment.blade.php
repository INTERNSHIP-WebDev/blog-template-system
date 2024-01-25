<div class="comment d-flex mb-5">
    <div class="flex-shrink-0">
        <div class="avatar avatar-sm rounded-circle">
            <img class="avatar-img" src="{{ $image }}" alt="" class="img-fluid">
        </div>
    </div>
    <div class="flex-shrink-1 ms-2 ms-sm-3">
        <div class="comment-meta d-flex">
            <h6 class="me-2">{{ $author }}</h6>
            <span class="text-muted">4d</span>
        </div>
        <div class="comment-body">
            {{ $body }}
        </div>
    </div>
</div>