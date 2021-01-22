<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Bookable;
use Illuminate\Http\Request;

class BookableAvailabilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id,Request $request)
    {
        $data = $request ->validate([

            'start_date' => 'required|date_format:Y-m-d|after_or_equal:now',
            'end_date' =>'required|date_format:Y-m-d|after_or_equal:start_date'
        ]);

        $bookable = Bookable::findOrFail($id);
        return $bookable->available($data['start_date'],$data['end_date']) ? response()->json([]) : response()->json([],404);
        
    }
}
