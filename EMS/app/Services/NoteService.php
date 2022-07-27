<?php
namespace App\Services;

use App\Repositories\NoteRepository;

class NoteService 
{

    /**
     * @var noteRepository
    */
    protected $noteRepository;


    /**
     * UserService constructor.
     * @param noteRepository $noteRepository
     */
    public function __construct(NoteRepository $noteRepository)
    {
        $this->noteRepository = $noteRepository;
    }



    public function getAllNote()
    {
        return $this->noteRepository->getAllNote(); 
    }



    public function createNote($request)
    {

        $request -> validate([
            'subject' => 'required', 
            'date' => 'required',
            'note' => 'required'
        ]);

        $this->noteRepository->createNote($request); 
    }



    public function editNote($id)
    {   
        $data = $this->noteRepository->editNote($id);
        

        return response()->json([
            'status'=>200,
            'notes'=>$this->noteRepository->editNote($id)
        ]);
    }


    public function updateNote($request)
    {

        $request -> validate([
            // 'date' => 'required', 
            'subject' => 'required',  
        ]);

        $this->noteRepository->updateNote($request); 
    }


    public function deleteNote($id)
    {
        return $this->noteRepository->deleteNote($id); 
    }

}