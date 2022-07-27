<?php
namespace App\Services;

use App\Repositories\NoticeRepository;

class NoticeService 
{

     /**
     * @var noticeRepository
    */
    protected $noticeRepository;


    /**
     * UserService constructor.
     * @param NoticeRepository $employeeRepository
     */
    public function __construct(NoticeRepository $noticeRepository)
    {
        $this->noticeRepository = $noticeRepository;
    }


    public function getAllNotices()
    {
        return $this->noticeRepository->getAllNotices(); 
    }

    public function showNotices($id)
    {
        return $this->noticeRepository->showNotices($id); 
    }


    public function editNotice($id)
    {
        return $this->noticeRepository->editNotice($id); 
    }



    public function deleteNotice($id)
    {
        return $this->noticeRepository->deleteNotice($id); 
    }



    public function createNotice($request)
    {

        $request -> validate([
            'subject' => 'required', 
            'notice' => 'required', 
            'notice_date' => 'required', 
        ]);

        $this->noticeRepository->createNotice($request); 
    }


    public function updateNotice($request, $id)
    {

        $request -> validate([
            'subject' => 'required', 
            'notice' => 'required', 
            'notice_date' => 'required', 
        ]);

        $this->noticeRepository->updateNotice($request, $id); 
    }

}