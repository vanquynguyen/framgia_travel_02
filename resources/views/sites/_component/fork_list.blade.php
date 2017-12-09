<h4 class="h4-plan"><i class="fa fa-code-fork" aria-hidden="true"></i>  {{ trans('site.you_have') }} : ({{ count($number_forks) }}) </h4>
@foreach($number_forks as $number_fork)
    @if(count($number_forks))
        <a href="{{ route('fork.schedule', $number_fork->id) }}" class="view-fork-schedule">
            <div class="tile" id="title">
                <h1 class="del-plan">
                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                </h1>
                <img src="{{ asset('images/avatar.png') }}">
                <div class="text">
                    <h3 class="animate-text">
                        {{ trans('admin.plan') }} {{ $loop->iteration }}
                    </h3>
                </div>
                <div class="create-schedule">{{ trans('site.view_schedule') }}</div>
            </div>
        </a>
    @endif
@endforeach
