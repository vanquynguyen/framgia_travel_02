<h4 class="h4-plan"><i class="fa fa-calendar" aria-hidden="true"></i> {{ trans('site.my_plans') }}</h4>
@foreach($plans as $plan)
    @if(count($plans))
        <div id="plan-detail">
            <table id="table-plan">
            <tr>
                <td>
                    <span>{{ trans('site.fork') }}</span>
                </td>
                <td>
                    <a class="fa fa-eye" aria-hidden="true" id="view_fork" data-toggle="modal" data-target="#view_list_fork" data-id="{{ $plan->id }}"> &nbsp;  {{ count($plan->forks) }}
                    </a>
                </td>
            </tr>
            <tr>
                <td><span>{{ trans('site.booking') }}</span></td>
                <td><a class="fa fa-eye" aria-hidden="true" id="view_booking" data-toggle="modal" data-target="#view_list_booking" data-id="{{ $plan->id }}"> &nbsp;  {{ count($plan->bookings) }}
            </a></td>
            </tr>
            <tr>
                <td>{{ trans('site.status') }}</td> 
                <td>
                    <span>{{ ($plan->status == config('setting.status.inprogress')) ? trans('admin.inprogress') : trans('admin.approved') }}</span>
                </td>
            </tr>
            </table>
            <div>
                <h5 class="title-plan">{{ $plan->title }}</h5>
                <a href="{{ route('user.schedule', $plan->id) }}" class="content-plan">
                    <div class="tile">
                        <h1 class="del-plan">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                        </h1>
                        @foreach($plan->galleries as $gallery)
                            <img src="/images/{{ $gallery->image }}")>
                        @endforeach
                        <div class="text">
                            <h5 class="animate-text">
                                {{ trans('site.start_at') }}:
                                {{ $plan->start_at }}
                                <br>
                                {{ trans('site.end_at') }}:
                                {{ $plan->end_at }}
                            </h5>
                            @php
                                $choices = $plan->planProvinces->keyby('province_id');
                            @endphp
                            @foreach($choices as $choice)
                                <h5 class="animate-text">
                                    <i class="fa fa-hand-o-right"></i>
                                    {{ $choice->province->name }}
                                </h5>
                            @endforeach
                        </div>
                        <div class="create-schedule">{{ trans('site.create_schedule') }}</div>
                    </div>
                </a>
            </div>
        </div>
    @endif
@endforeach
