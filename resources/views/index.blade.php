@extends('sites.master')

@section('style')
    {{ Html::style('bowers/toastr/toastr.css')}}
@endsection

@section('content')

<section class="bannercontainer">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
           <ul>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('images/img_sites/home/slider/slider-01.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li  data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <img src="{{ asset('images/img_sites/home/slider/slider-02.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('images/img_sites//home/slider/slider-03.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
                    <img src="{{ asset('images/img_sites/home/slider/slider-04.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
            </ul>
            <div class="tp-rightarrow tparrows hesperiden" style="top: 50%; transform: matrix(1, 0, 0, 1, -105, -42); left: 100%;"></div>
        </div>
    </div>
</section>
<!-- SEARCH TOUR -->
<section class="darkSection">
    <div class="container">
        <div class="row gridResize">
            <div class="col-sm-3 col-xs-12">
                <div class="sectionTitleDouble">
                    <p>{{ trans('site.search') }}</p>
                    <h2>{{ trans('site.your_plans') }}</span></h2>
                </div>
            </div>
            <div class="col-sm-7 col-xs-12">
                <div class="row">
                    <div class="col-sm-3 col-xs-12">
                        <div class="searchTour">
                            <select name="guiest_id2" id="guiest_id2" class="select-drop">
                                <option value="0">{{ trans('site.destinations') }}</option>
                                @foreach($provinces as $province)
                                    <option>{{ $province->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="input-group date ed-datepicker" data-provide="datepicker">
                            <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="input-group date ed-datepicker" data-provide="datepicker">
                            <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                            <div class="input-group-addon">
                                <span class="fa fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 col-xs-12">
                        <div class="searchTour">
                            <select name="guiest_id3" id="guiest_id3" class="select-drop">
                                <option value="0">$1000 - $2000</option>
                                <option value="1">$1400 - $2000</option>
                                <option value="2">$1600 - $2000</option>
                                <option value="3">$1800 - $2000</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-2 col-xs-12">
                <a href="#" class="btn btn-block buttonCustomPrimary">{{ trans('site.search') }}</a>
            </div>
        </div>
    </div>
</section>
<!-- TOP DEALS -->
<section class="mainContentSection packagesSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span class="lightBg">{{ trans('site.top_rate') }}</span></h2>
                </div>
            </div>
        </div>
        @foreach($planRates as $plan)
            @php
                $gallery = $plan->galleries->random(1)->first();
            @endphp
            <div class="col-sm-4 col-xs-12">
                <div class="thumbnail deals">
                    <img src="/images/{{ $gallery->image }}" alt="deal-image">
                    <a href="{{ route('user.plan.detail', $plan->id) }}" class="pageLink"></a>
                    <div class="discountInfo">
                        <div class="discountOffer">
                            <h4>{{ trans('site.hot') }}</h4>
                        </div>
                    </div>
                    <div class="caption">
                        <h4><a href="{{ route('user.plan.detail', $plan->id) }}" class="captionTitle">{{ $plan->title }}</a></h4>
                        <p>{{ $plan->descriptions }}</p>
                        <div class="detailsInfo">
                            <h5>
                                <span>{{ trans('site.start_from') }}</span>
                                ${{ $plan->price }}
                            </h5>
                            <ul class="list-inline detailsBtn">
                                <li><a href="{{ route('user.plan.detail', $plan->id) }}" class="btn buttonTransparent">{{ trans('site.details') }}</a></li>
                                @if(Auth::check())
                                    <li><a href='{{ route('user.plan.booking', $plan->id) }}' class="btn buttonTransparent">{{ trans('site.book_now') }}</a></li>
                                @else
                                    <li><a class="btn buttonTransparent" id="check_book">{{ trans('site.book_now') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span class="lightBg">{{ trans('site.top_booking') }}</span></h2>
                </div>
            </div>
        </div>
        @foreach($planBookings as $booking)
            @php
                $gallery = $booking->plan->galleries->random(1)->first();
            @endphp
            <div class="col-sm-4 col-xs-12">
                <div class="thumbnail deals">
                    <img src="/images/{{ $gallery->image }}" alt="deal-image">
                    <a href="{{ route('user.plan.detail', $plan->id) }}" class="pageLink"></a>
                    <div class="discountInfo">
                        <div class="discountOffer">
                            <h4>{{ trans('site.hot') }}</h4>
                        </div>
                    </div>
                    <div class="caption">
                        <h4><a href="{{ route('user.plan.detail', $plan->id) }}" class="captionTitle">{{ $booking->plan->title }}</a></h4>
                        <p>{{ $booking->plan->descriptions }}</p>
                        <div class="detailsInfo">
                            <h5>
                                <span>{{ trans('site.start_from') }}</span>
                                ${{ $booking->plan->price }}
                            </h5>
                            <ul class="list-inline detailsBtn">
                                <li><a href="{{ route('user.plan.detail', $booking->plan->id) }}" class="btn buttonTransparent">{{ trans('site.details') }}</a></li>
                                @if(Auth::check())
                                    <li><a href='{{ route('user.plan.booking', $plan->id) }}' class="btn buttonTransparent">{{ trans('site.book_now') }}</a></li>
                                @else
                                    <li><a class="btn buttonTransparent" id="check_book">{{ trans('site.book_now') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach 
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span class="lightBg">{{ trans('site.new_plans') }}</span></h2>
                </div>
            </div>
        </div>
        @foreach($planNews as $plan)
            @php
                $gallery = $plan->galleries->random(1)->first();
            @endphp
            <div class="col-sm-4 col-xs-12">
                <div class="thumbnail deals">
                    <img src="/images/{{ $gallery->image }}" alt="deal-image">
                    <a href="{{ route('user.plan.detail', $plan->id) }}" class="pageLink"></a>
                    <div class="discountInfo">
                        <div class="discountOffer">
                            <h4>{{ trans('site.new') }}</h4>
                        </div>
                    </div>
                    <div class="caption">
                        <h4><a href="{{ route('user.plan.detail', $plan->id) }}" class="captionTitle">{{ $plan->title }}</a></h4>
                        <p>{{ $plan->descriptions }}</p>
                        <div class="detailsInfo">
                            <h5>
                                <span>{{ trans('site.start_from') }}</span>
                                ${{ $plan->price }}
                            </h5>
                            <ul class="list-inline detailsBtn">
                                <li><a href="{{ route('user.plan.detail', $plan->id) }}" class="btn buttonTransparent">{{ trans('site.details') }}</a></li>
                                @if(Auth::check())
                                    <li><a href='{{ route('user.plan.booking', $plan->id) }}' class="btn buttonTransparent">{{ trans('site.book_now') }}</a></li>
                                @else
                                    <li><a class="btn buttonTransparent" id="check_book">{{ trans('site.book_now') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
<!-- PROMOTION PARALLAX -->
<section class="promotionWrapper">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="promotionTable">
                    <div class="promotionTableInner">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- DESTINATIONS -->
<section class="whiteSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span>{{ trans('site.our_destinations') }}</span></h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="media destinations">
                    <a class="media-left" href="destination-cities.html">
                    <img class="media-object" src="images/img_sites/home/destination.jpg" alt="Destination">
                    </a>
                    <div class="media-body">
                        <h3 class="media-heading">{{ trans('site.choose') }}<br>{{ trans('site.your_destination') }}</h3>
                        <div class="clearfix">
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Asia</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Aenean</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Etiam</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Donec</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Europe</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Maecenas</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Cras Sagittis</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Vestibulum</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>America</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Morbi Sed</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Pellentesque</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Proin</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Africa</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Duis Eu</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Morbi Nisl</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Curabitur</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><i class="fa fa-minus" aria-hidden="true"></i>Australia</li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Vivamus</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Nibh Odio</a></li>
                                <li><a href="destination-single-city.html"><i class="fa fa-square" aria-hidden="true"></i>Dictum</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- COUNTING PARALLAX -->
<section class="countUpSection">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </div>
                    <div class="counter">{{ $totalProvince }}</div>
                    <h5>{{ trans('site.destinations') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-gift" aria-hidden="true"></i>
                    </div>
                    <div class="counter">{{ $totalService }}</div>
                    <h5>{{ trans('site.plan_pack') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-smile-o" aria-hidden="true"></i>
                    </div>
                    <div class="counter">{{ $totalCustomer }}</div>
                    <h5>{{ trans('site.happy_clients') }}</h5>
                </div>
            </div>
            <div class="col-sm-3 col-xs-6">
                <div class="text-center">
                    <div class="icon">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                    </div>
                    <div class="counter">24</div>
                    <h5>{{ trans('site.hours_support') }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- TOUR PACKAGES -->
<section class="whiteSection">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="sectionTitle">
                    <h2><span>{{ trans('site.provinces') }}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="filter-container isotopeFilters">
                    <ul class="list-inline filter">
                        <li class="active"><a href="#" data-filter="*">{{ trans('site.all_places') }}</a></li>
                        <li><a href="#" data-filter=".asia">Asia</a></li>
                        <li><a href="#" data-filter=".america">America</a></li>
                        <li><a href="#" data-filter=".africa">Africa</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row isotopeContainer">
            @foreach($provinces as $province) 
                <div class="col-sm-4 isotopeSelector asia">
                    <article class="">
                        <figure>
                            <img src="{{ $province->image }}" alt="" height="300px">
                            <h4>{{ $province->name }}</h4>
                            <div class="overlay-background">
                                <div class="inner"></div>
                            </div>
                            <div class="overlay">
                                <a class="fancybox-pop" href="single-package-fullwidth.html">
                                    <div class="overlayInfo">
                                        <h5><span></span></h5>
                                        <p><i class="fa fa-calendar" aria-hidden="true"></i>{{ substr($province->description, 0, 20) }}...</p>
                                    </div>
                                </a>
                            </div>
                        </figure>
                    </article>
                </div>
            @endforeach
            <div class="row">{{ $provinces->links() }}</div>
        </div>
    </div>
</section>
@endsection
@section('script')
    {{ Html::script('bowers/toastr/toastr.js') }}
    {{ Html::script('js/index.js') }}
@endsection
