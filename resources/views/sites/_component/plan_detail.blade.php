@extends('sites.master')

@section('style')
    {{ Html::style('css/plan_detail.css') }}
@endsection()

@section('content')

<section class="bannercontainer">
    <div class="fullscreenbanner-container">
        <div class="fullscreenbanner">
            <ul>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="700" data-title="Slide 1">
                    <img src="{{ asset('images/img_sites/home/slider/slider-01.jpg') }}" alt="slidebg1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                </li>
                <li data-transition="parallaxvertical" data-slotamount="5" data-masterspeed="1000" data-title="Slide 2">
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
<br>
<section class="container">
    <div id="detail-plan">
        <div clas="detail-content" id="detail-content">
            <div class="row">
                <div class="col-md-4">
                    <div id="avatar" class="carousel slide" data-ride="carousel">
                         <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="{{ asset('images/image/congtroilaichau.jpg') }}" alt="..." >
                                <div class="carousel-caption">
                                </div>
                            </div>
                            <div class="item">
                                <img src="{{ asset('images/image/hoabinh1.jpg') }}" alt="..."  >
                                <div class="carousel-caption">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="col-md-8">
                    <h1 class="detail-title">{{ $plan->title }}</h1>
                    <p class="detail-trip" >
                        <span>{{ trans('site.itinerary') }}:</span>
                        <span>
                            @foreach($planProvinces as $planProvince)
                                - {{ $planProvince->province->name }}
                            @endforeach
                        </span>
                    </p>
                    <p>
                        <span class="author">{{ trans('site.author') }}:</span>
                        <span> 
                            @foreach($getUser as $getUser)
                                {{ $getUser->user->full_name }}
                            @endforeach
                        </span>
                    </p>
                    <div class="rating" data-value="4.75" data-index="21">
                        <div data-id="YHVWzfTOPhM%3d" class="rating-star rating-tour" style="cursor: pointer;">
                            <img alt="1" src="{{ asset('images/image/star-on.png') }}" title="bad">
                            <img alt="2" src="{{ asset('images/image/star-on.png') }}" title="poor">
                            <img alt="3" src="{{ asset('images/image/star-on.png') }}" title="regular">
                            <img alt="4" src="{{ asset('images/image/star-on.png') }}" title="good">
                            <img alt="5" src="{{ asset('images/image/star-half.png') }}" title="gorgeous"><input name="score" type="hidden" value="4.75">
                            <span>
                            <b class="rating-value rating-tt"></b>
                            </span>
                        </div>
                    </div>
                    <div class="detail-content-1">
                        <p>{{ $plan->description }}</p>
                    </div>
                    <div class="detail-content-under">
                        <div class="detail-bot">
                            <p>
                                <span>{{ trans('site.start_at') }}:</span>
                                <span> {{ $provinceFirst->province->name }} </span>
                            </p>
                            <p>
                                <span>{{ trans('site.time') }}:</span>
                                <span>{{ $plan->start_at }} - {{ $plan->end_at }}</span>
                            </p>
                        </div>
                        <div class="detail-right">
                            <span >{{ trans('site.start_from') }}:</span>
                            <span class="detail-price">{{ $plan->price }}$</span>
                            @if($plan->status == config('setting.status.inprogress'))
                                <p>
                                    <span>{{ trans('site.status') }}:</span>
                                    <span>{{ trans('site.inprocess') }}</span>
                                </p>
                            @else
                                <p>
                                    <span>{{ trans('site.status') }}:</span>
                                    <span>{{ trans('site.approved') }}</span>
                                </p>
                                <p>
                                    <a href="" class="btn buttonTransparent">{{ trans('site.book_now') }}</a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="detail" id="tab-plan">
                    <ul class="nav nav-tabs" role="tablist" class="active">
                        <li role="presentation" class="active">
                            <a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">{{ trans('site.overview') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#itinerary" aria-controls="itinerary" role="tab" data-toggle="tab">{{ trans('site.itinerary') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#start_at" aria-controls="start_at" role="tab" data-toggle="tab" >{{ trans('site.start_at') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#note" aria-controls="note" role="tab" data-toggle="tab" >{{ trans('site.note') }}</a>
                        </li>
                        <li role="presentation">
                            <a href="#comment" aria-controls="comment" role="tab" data-toggle="tab" >{{ trans('site.comment') }}</a>
                        </li>
                    </ul>
                <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="overview">
                            <p>
                                <a href=""></a> - {{ $plan->description }}
                            </p>
                            <div align="center">
                                <img class="img-thumbnail img-overview" src="{{ asset('images/image/ha1.jpg') }}"/>
                            </div>
                            <p class="title-img"><strong></strong></p>
                            <div align="center">
                                <img class="img-thumbnail img-overview" src="{{ asset('images/image/ha2.jpg') }}"/>
                            </div>
                            <p class="title-img"><strong></strong></p>
                            <div align="center">
                                <img class="img-thumbnail img-overview" src="{{ asset('images/image/ha3.jpg') }}"/>
                            </div>
                            <p class="title-img"><strong></strong></p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="itinerary">
                            <div id="framgia-schedule" class="tab-pane fade in  clearfix active">
                                <ul >
                                    @foreach($schedules as $schedule)
                                        <li class="clearfix">
                                            <div class="framgia-rl">
                                                <p class="date-schedule">
                                                    {{ trans('site.day') }}{{ $schedule->date }}
                                                </p>
                                                <img src="https://dulichviet.com.vn//images/bandidau/images/Icon/icon-xe-du-lich_du-lich-viet.png">
                                            </div>
                                            <div class="framgia-rr">
                                                <i class="fa fa-circle fa-2x icon-title"></i>
                                                <div class="framgia-title">  
                                                    {{ $schedule->title }}
                                                </div>
                                                <div class="framgia-day">
                                                    <i class="fa fa-circle icon-content"></i>
                                                    {{ $schedule->start_at }}-{{ $schedule->end_at }}:{{ $schedule->description }}
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="start_at">
                        </div> 
                        <div role="tabpanel" class="tab-pane" id="note">
                        </div> 
                        <div role="tabpanel" class="tab-pane" id="comment">
                            <form action="{{ route('user.plan.comment', $plan->id) }}" id="comment-form" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="text" name="plan_id" id="plan_id" data-id="{{ $plan->id }}" hidden>
                                <textarea name="content" class="form-control text-comment"></textarea>
                                <button type="submit" class="btn buttonTransparent btn-comment">{{ trans('site.comment') }}</button>
                           </form>
                           <br>
                            <div class="show-comment"></div>
                                @foreach($comments as $comment)
                                    <header class="comment-header">
                                        <p class="comment-author">
                                            <img src="{{ $comment->user->avatar }}" class="img-circle img-comment">
                                        </p>
                                        <p>
                                            <a href="">{{ $comment->user->full_name }}</a><span> {{ trans('site.say') }}:</span>
                                        </p>
                                        <p>
                                            {{ $comment->created_at }}
                                        </p>
                                        <p>{{ $comment->content }}</p>
                                    </header>
                                @endforeach
                          </div>        
                        </div>
                    </div>
                </div>    
            </div>    
        </div>
    </div>
    <br>
    <div class="framgia-title-type-2 clearfix">
        <h2><span class="framgia-title-lb"></span></h2>
        <p class="framgia-line"></p>
    </div>
    <div class="row more-plan">
    <hr>
        <div class="col-xs-12">
            <div class="relatedProduct">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="relatedItem">
                            <img src="{{ asset('images/image/hoatroi.jpg') }}">
                            <div class="maskingInfo">
                                <h4></h4>
                                <p></p>
                                <a href="#" class="btn buttonTransparent">{{ trans('site.viewmore') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="relatedItem">
                            <img src="{{ asset('images/image/tam-suoi.jpg') }}">
                            <div class="maskingInfo">
                                <h4></h4>
                                <p></p>
                                <a href="#" class="btn buttonTransparent">{{ trans('site.viewmore') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="relatedItem">
                            <img src="{{ asset('images/image/thactinhyeu.jpg') }}">
                            <div class="maskingInfo">
                                <h4></h4>
                                <p></p>
                                <a href="#" class="btn buttonTransparent">{{ trans('site.viewmore') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="framgia-title-type-2 clearfix">
        <h2><span class="framgia-title-lb"></span></h2>
        <p class="framgia-line"></p>
    </div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="item-slide">
                    <div class="item-slide-content">
                        <a href=""><img src="{{ asset('images/image/congtroilaichau.jpg') }}"/></a>
                        <h2></h2>
                        <a href="">{{ trans('site.viewmore') }} &nbsp;<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item-slide">
                    <div class="item-slide-content">
                        <a href=""><img src="{{ asset('images/image/hoabinh1.jpg') }}"/></a>
                        <h2></h2>
                        <a href="">X{{ trans('site.viewmore') }} &nbsp;<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item-slide">
                    <div class="item-slide-content">
                        <a href=""><img src="{{ asset('images/image/hoabinh3.jpg') }}"/></a>
                        <h2></h2>
                        <a href="">{{ trans('site.viewmore') }} &nbsp;<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="carousel-caption">
                </div>
            </div>
            <div class="item">
                <div class="item-slide">
                    <div class="item-slide-content">
                        <a href=""><img src="{{ asset('images/image/hoatroi.jpg') }}"/></a>
                        <h2></h2>
                        <a href="">{{ trans('site.viewmore') }} &nbsp;<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item-slide">
                    <div class="item-slide-content">
                        <a href=""><img src="{{ asset('images/image/thitgacbep.jpg') }}"/></a>
                        <h2></h2>
                        <a href="">{{ trans('site.viewmore') }} &nbsp;<i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="item-slide">
                    <div class="item-slide-content">
                        <a href=""><img src="{{ asset('images/image/test3.jpg') }}"/></a>
                        <h2></i></a>
                    </div>
                </div>
                <div class="carousel-caption">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('js/comment.js') }}  
@endsection 
