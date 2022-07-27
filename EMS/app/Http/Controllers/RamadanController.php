<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RamadanService;

class RamadanController extends Controller
{

    /**
     * @var ramadanService
     */
    protected $ramadanService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(RamadanService $ramadanService)
    {
        $this->ramadanService = $ramadanService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ramadanlist = $this->ramadanService->getAllRamadanList();
        return view('set-ramadan-time', compact('ramadanlist'));
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
        $this->ramadanService->createRamadan($request);
        return redirect()->back()->with('success','Ramadan schduled Added');
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
        return $this->ramadanService->editRamadan($id);
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
        $this->ramadanService->updateRamadan($request);
        return redirect()->back()->with('success','Ramadan Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->ramadanService->deleteRamadan($id);
        return redirect()->back()->with('fail','Ramadan Deleted!');
    }
}
