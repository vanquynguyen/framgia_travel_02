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
    <ul>
        @foreach($plans as $plan)
            <li>
                <a href="{{ route('user.plan.detail', $plan->id) }}"><p>{{ $plan->title }}</p></a>
            </li>
        @endforeach
    </ul>
@else
    <h4>{{ trans('site.not_found') }}</h4> 
@endif
