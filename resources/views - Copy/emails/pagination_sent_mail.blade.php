<div class="row">
    <!-- Email list -->
    <ul class="message-list">
        @foreach($concerns as $concern)
        @if($concern->send_email === auth()->user()->email)
        <li>
            <div class="col-mail col-mail-1">
                <div class="checkbox-wrapper-mail">
                    <input type="checkbox" id="chk{{ $concern->id }}" class="checkbox-bulk" data-id="{{ $concern->id }}">
                    <label for="chk{{ $concern->id }}" class="toggle"></label>
                </div>
                <a href="javascript: void(0);" class="title">To: {{ $concern->rcpt_email }}</a><span class="star-toggle far fa-star"></span>
            </div>
            <div class="col-mail col-mail-2">
                <a href="{{ route('emails.show', $concern->id) }}" class="subject">{{ $concern->subject }} - <span class="teaser">{{ $concern->message }}</span></a>
                <div class="date">{{ $concern->created_at->format('M d') }}</div>
            </div>
        </li>
        @endif
        @endforeach
    </ul>
    {!! $concerns->links() !!}
</div>