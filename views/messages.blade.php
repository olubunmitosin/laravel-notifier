@if(session()->has('notifiers'))
    @foreach(session()->get('notifiers') as $notice)
        <div class="alert alert-{{ $notice['level'] }}">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @if(!is_null($notice['title']))
                <strong>{{ $notice['title'] }}</strong>
            @endif

            {!! $notice['message'] !!}
        </div>
    @endforeach
@endif
