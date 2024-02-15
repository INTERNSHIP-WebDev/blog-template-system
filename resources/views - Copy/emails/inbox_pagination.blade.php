<div class="row">
    <!-- Email list -->
    <ul class="message-list">
        @foreach($concerns as $concern)
        @php
        $emailClass = $concern->status ? '' : 'unread-email';
        @endphp
        @if($concern->rcpt_email === auth()->user()->email)
        <li class="{{ $emailClass }}">
            <div class="col-mail col-mail-1">
                <div class="checkbox-wrapper-mail">
                    <input type="checkbox" id="chk{{ $concern->id }}" class="checkbox-bulk" data-id="{{ $concern->id }}">
                    <label for="chk{{ $concern->id }}" class="toggle"></label>
                </div>
                <a href="javascript: void(0);" class="title">{{ $concern->send_name }}</a><span class="star-toggle far fa-star"></span>
            </div>
            <div class="col-mail col-mail-2">
                <a href="{{ route('emails.show', $concern->id) }}" class="subject">{{ $concern->subject }} - <span class="teaser">{{ $concern->message }}</span></a>
                <div class="date">{{ $concern->created_at->format('M d') }}</div>
            </div>
        </li>
        @endif
        @endforeach
    </ul>
    {!! $concerns->appends(['InboxCount' => $InboxCount, 'SentMailCount' => $SentMailCount, 'DraftCount' => $DraftCount, 'TrashCount' => $TrashCount])->links() !!}
</div>