<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PolicyService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

class PolicyController extends Controller
{
    /**
     * @var policyService
     */
    protected $policyService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(PolicyService $policyService)
    {
        $this->policyService = $policyService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $policy= $this->policyService->getAllPolicy();
        // dd($policy[1]->policyFile);
        return view('policy', compact('policy'));
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
        $policy = $this->policyService->createPolicy($request);
        return redirect()->route('policy.index')->with('success','Policy Added');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->policyService->deletePolicy($id);
        return redirect()->route('policy.index')->with('fail','Policy Deleted');
    }

    public function downloadPolicy(Request $request, $filename)
    {
        dd('AkASH');
        dd($filename);
        $pathToFile = storage_path('policyFiles/' .$filename);
        return response($pathToFile);
        // return response()->download(public_path('PolicyFiles/'.$filename));
    }
}
