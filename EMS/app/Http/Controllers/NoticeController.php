<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NoticeService;

class NoticeController extends Controller
{


        /**
     * @var noticeService
     */
    protected $noticeService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(NoticeService $noticeService)
    {
        $this->noticeService = $noticeService;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices= $this->noticeService->getAllNotices();
        return view('notice', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add-notice');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->noticeService->createNotice($request);
        return redirect()->route('notice.index')->with('success','Notice Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticeDetails = $this->noticeService->showNotices($id);
        return view('notice-details', compact('noticeDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notices = $this->noticeService->editNotice($id);
        return view('edit-notice', compact('notices'));
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
        $this->noticeService->updateNotice($request, $id);
        return redirect()->route('notice.index')->with('success','Notice Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->noticeService->deleteNotice($id);
        return redirect()->route('notice.index')->with('fail','Notice Deleted');
    }
}
