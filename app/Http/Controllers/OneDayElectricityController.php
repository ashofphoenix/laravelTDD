<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\OneHourElectricity;
use App\Models\Panel;

use Carbon\Carbon;   

class OneDayElectricityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $panel = Panel::where('serial', $request->panel_serial)->firstOrFail();
        $dailyCollection = OneHourElectricity::where('panel_id', $panel->id)
                                    ->get()
                                    ->groupBy(function($query){return $query->created_at->format('Y-m-d');});

        $data = array();

        // Looping through the collection to get min,max,avg,sum
        foreach ($dailyCollection as $key => $value) {
            $dailyData['day'] = $key;
            $dailyData['sum'] = $value->sum('kilowatts');
            $dailyData['min'] = $value->min('kilowatts');
            $dailyData['max'] = $value->max('kilowatts');
            $dailyData['average'] = $value->avg('kilowatts');

            $data[] = $dailyData;
        }
        return $data;
    }
}
