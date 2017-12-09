@foreach($guides as $guide)
    <div class="col-md-4 content-guide">
        <a href="{{ route('user.dashboard', $guide->id) }}"><img src="{{ $guide->avatar }}" class="img img-circle img-guide"></a>
        <p class="level">{{ trans('site.guide') }}</p>
        <p class="full_name">{{ $guide->full_name }}</p>
        <a href="" class="email-guide"><i class="fa fa-envelope"></i> {{ $guide->email }}</a>
        <p class="address-guide"><i class="fa fa-map-marker"></i> {{ $guide->address }}</p>
        <p class="view_profile">
            <a href="{{ route('user.dashboard', $guide->id) }}">{{ trans('site.view_profile') }}</a>
        </p>
    </div>
@endforeach