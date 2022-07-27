<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Route;

class AttachFilesController extends Controller
{
    /**
     * @var attachmentService
     */
    protected $attachmentService;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachments= $this->attachmentService->getAllAttachment();
        // dd($attachments[0]->employee->name);
        return view('attachment', compact('attachments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeDept= $this->attachmentService->getEmployeeDepartment();
        $employeeSearch= $this->attachmentService->SearchEmployee();

        return view('add-attachment', compact('employeeDept','employeeSearch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $this->attachmentService->createAttachment($request);
        return redirect()->route('attachment.index')->with('success','Attachment Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attachmentDetails = $this->attachmentService->showAttachment($id);
        return view('attachment-detail', compact('attachmentDetails'));
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
        //
    }

    // public function attachment(){
        
    // }

    // public function addAttachment(){
    //     return view('add-attachment');
    // }
}
