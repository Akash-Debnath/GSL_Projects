<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\HolidayService;
use Illuminate\Support\Facades\Route;

class HolidayController extends Controller
{
    /**
     * @var holidayService
     */
    protected $holidayService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(HolidayService $holidayService)
    {
        $this->holidayService = $holidayService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holiday= $this->holidayService->getAllHoliday();
        return view('holiday', compact('holiday'));
    }



    public function searchHoliday(Request $request)
    {
        $holiday= $this->holidayService->searchHoliday($request);
        return view('holiday', compact('holiday'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->holidayService->createHoliday($request);
        return redirect()->back()->with('success','Holiday Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->holidayService->editHoliday($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->holidayService->updateHoliday($request);
        return redirect()->back()->with('success','Holiday Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->holidayService->deleteHoliday($id);
        return redirect()->back()->with('fail','holiday Deleted');
    }

}
