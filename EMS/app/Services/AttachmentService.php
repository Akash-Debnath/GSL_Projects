<?php
namespace App\Services;


use App\Repositories\AttachmentRepository;

class AttachmentService 
{

    /**
     * @var AttachmentRepository
    */
    protected $attachmentRepository;


    /**
     * UserService constructor.
     * @param AttachmentRepository $attachmentRepository
     */
    public function __construct(AttachmentRepository $attachmentRepository)
    {
        $this->attachmentRepository = $attachmentRepository;
    }


    
    public function getAllAttachment()
    {
        return $this->attachmentRepository->getAllAttachment();
    }


    public function showAttachment($id)
    {
        return $this->attachmentRepository->showAttachment($id);
    }



    public function SearchEmployee()
    {
        return $this->attachmentRepository->SearchEmployee(); 
    }



    public function getEmployeeDepartment()
    {
        return $this->attachmentRepository->getEmployeeDepartment(); 
    }
    


    public function createAttachment($request)
    {

        $request -> validate([
            'subject' => 'required', 
            'message' => 'required', 
            'message_date' => 'required', 
            // 'filename' => 'mimes:doc,pdf,docx'
        ]);

        $attachmentId = $this->attachmentRepository->createAttachment($request); 
        //dd( $attach);
        $this->attachmentRepository->createAttachmentfile($request,$attachmentId); 
    }


}