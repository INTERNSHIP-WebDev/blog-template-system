
    <div style="max-height: 500px; overflow-y: auto;">
        @if($tempNotifications->isNotEmpty())
            @foreach($tempNotifications as $notification)
                @php
                    $template = App\Models\Template::find($notification->temp_id);
                    $header = Str::limit($template->header, 50);
                @endphp
                <a href="{{ route('guests.show', ['guest' => $template->id]) }}" class="text-decoration-none notification-card" onclick="markAsRead({{ $notification->id }})">
                    <div class="card bg-transparent-card w-100 border-0 ps-5 mb-3">
                        <img src="{{ $template ? asset('images/banners/' . $template->banner) : asset('images/user-default.png') }}" alt="template banner" class="w40 position-absolute left-0">
                        <h5 class="font-xsss text-grey-900 mb-1 mt-0 fw-700 d-block">{{ $header }} <span class="text-grey-400 font-xsssss fw-600 float-right mt-1">{{ $notification->created_at->diffForHumans() }}</span></h5>
                        <h6 class="text-grey-500 fw-500 font-xssss lh-4">{{ $notification->message }}</h6>
                    </div>
                </a>
            @endforeach
        @else
            <p>No new notifications.</p>
        @endif
    </div>
</div>