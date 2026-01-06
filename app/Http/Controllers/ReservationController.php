<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function store(StoreReservationRequest $request)
    {

        Reservation::create($request->all());

        return redirect()->back()->with('success', 'تم ارسال حجزك وسيتم التواصل معك في اقرب وقت');
    }
}
