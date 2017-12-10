@extends('sites.master')

@section('style')
    {{ Html::style('css/guide.css')}} 
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
        </div>
    </div>
</section>
<section id="content">
<div id="show-guide">
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-3">
            <form action="" class="search-form">
                <div class="form-group has-feedback">
                    <label for="search" class="sr-only">Search</label>
                    <input type="text" class="form-control" name="search" id="search_guide" placeholder="search">
                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
            </form>
        </div>
    </div>
</div>
    <div class="guide-list">
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
        <div class="paginate">
            {{ $guides->links() }}
        </div>
    </div>
</div>
</section>
@endsection
@section('script')
    {{ Html::script('js/search-guide.js')}}
@endsection
