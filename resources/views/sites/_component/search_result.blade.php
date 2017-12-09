@if (!$provinces->isEmpty() && !$plans->isEmpty())
    <div class="header_search">
        <h4><span><i class="fa fa-map-marker" aria-hidden="true"></i></span> {{ trans('site.provinces') }}</h4>
    </div>
    <ul>
        @foreach($provinces as $province)
            <li>
                <a href=""><p>{{ $province->name }}</p></a>
            </li>
        @endforeach
    </ul>
    <div class="header_search">
         <h4><span><i class="fa fa-calendar" aria-hidden="true"></i></span> {{ trans('site.plans') }}</h4>
    </div>
    <ul class="content">
        @foreach($plans as $plan)
            <li>
            <a href="{{ route('user.plan.detail', $plan->id) }}">
                <div class="plan-search">
                    @foreach($plan->galleries->keyby('plan_id') as $gallery)
                        <img src="/images/{{ $gallery->image }}") width="50" height="50">
                    @endforeach
                </div>
                <p style="float: left;">{{ $plan->title }}</p>
                </a>
                
            </li>
        @endforeach
    </ul>
@else
    <h4>{{ trans('site.not_found') }}</h4> 
@endif
