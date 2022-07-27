<?php

namespace App\Repositories;

use App\Models\Attach_file;
use App\Models\Attach_msg;
use App\Models\Department;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttachmentRepository implements RepositoryInterface
{


    public function getAllAttachment()
    {
        return $attachment = Attach_msg::with('employee')->orderBy('id', 'DESC')->paginate(20);
    }


    public function showAttachment($id)
    {
        return $attachmentDetail = Attach_msg::where('id', '=', $id)->first();
    }



    public function SearchEmployee()
    {
        return $empSearch = Employee::where('archive','=', "N")->get();
    }

    public function getEmployeeDepartment()
    {
        return $employeeDept = Department::all();
    }


    public function createAttachment($data)
    {
        $attachment = Attach_msg::create(['subject' =>  $data->subject,'message_date'=>$data->message_date,'message'=>$data->message,'message_to'=>$data->message_to,'read_by'=>'','custom_recipient'=> $data->custom_recipient,'is_encrypted'=>'N','message_from'=>Auth::user()->username]);
        return  $attachment->id;

        // $attachment = new Attach_msg;
        // $attachment->subject = $data->subject;
        // $attachment->message_date = $data->message_date;
        // $attachment->message = $data->message;
        // $attachment->message_to = $data->message_to;
        // // $attachment->read_by = $data->read_by;
        // $attachment->custom_recipient = $data->custom_recipient;
        // $attachment->is_encrypted = "N";
        // $attachment->message_from = Auth::user()->username;
        // return $lastattachment = $attachment->save();
        // return $lastattachment->id;
    }



    public function createAttachmentfile($data,$attachmentId)
    {   
        // dd($data->file('filename'));
        $files = [];
        if($data->hasfile('filename'))
         {
            foreach($data->file('filename') as $file)
            {   
               
                $name = time().rand(1,100).'.'.$file->extension();
                $file->move(public_path('AttachmentFiles'), $name);  
                $attachment= new Attach_file();
                $attachment->filename =  $name; 
                $attachment->attachment_id =  $attachmentId; 
                $attachment->save();  
            }
         }
        //  dd('success');
        return;

    }


    public function all()
    {
        return true;
    }


    public function get($id)
    {
        return true;
    }




    public function create(array $data)
    {
        return true;
    }



    public function update(array $data, $id)
    {
        return true;
    }



    public function delete($id)
    {
        return true;
    }


}