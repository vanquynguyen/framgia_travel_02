<?php

namespace App\Http\Controllers\Sites;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Plan;
use App\Models\Province;
use App\Models\Service;
use App\Models\Customer;
use App\Models\Rate;
use App\Models\Booking;
use App\Models\Gallery;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $planRates = Plan::topRate()->paginate(3);
        $provinces = Province::paginate(9);
        $planBookings = Booking::topBooking();
        $planNews = Plan::newPlan()->paginate(3);
        $gallery = Gallery::with('plan')->get();
        $galleryFooter = Gallery::with('plan')->limit(6);
        $totalProvince = count($provinces);
        $services = Service::all();
        $totalService = count($services);
        $customers = Customer::all();
        $totalCustomer = count($customers);
   
        return view('index', compact(
            'planRates',
            'provinces',
            'planNews',
            'planBookings',
            'gallery',
            'totalProvince',
            'totalService',
            'totalCustomer',
            'galleryFooter'
        ));
    }

    public function searchAjax(Request $request)
    {
        if ($request->ajax()) {
            $keyword = $request->keyword;
            $provinces = Province::Where('name', 'like', '%' . $keyword . '%')->get();
            $plans = Plan::Where('title', 'like', '%' . $keyword . '%')->get();
            $html = view('sites._component.search_result', compact('provinces', 'plans'))->render();

            return response($html);
        }
    }

    public function showGuide()
    {
        $guides = User::Where('level', config('setting.level.guide'))->paginate(9);
        return view('sites._component.guide.index', compact('guides'));
    }

    public function searchGuide(Request $request)
    {
        $keyword = $request->keyword;
        $guides = User::Where('full_name', 'like', '%' . $keyword . '%')->get();
        $html = view('sites._component.guide.result', compact('guides'))->render();

        return response($html);
    }
}
