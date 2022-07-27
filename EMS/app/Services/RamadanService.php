<?php
namespace App\Services;

use App\Repositories\RamadanRepository;

class RamadanService 
{

    /**
     * @var ramadanRepository
    */
    protected $ramadanRepository;


    /**
     * UserService constructor.
     * @param ramadanRepository $ramadanRepository
     */
    public function __construct(RamadanRepository $ramadanRepository)
    {
        $this->ramadanRepository = $ramadanRepository;
    }



    public function getAllRamadanList()
    {
        return $this->ramadanRepository->getAllRamadanList(); 
    }


    public function createRamadan($request)
    {

        $request -> validate([
            'stime' => 'required|unique:ramadans', 
            'etime' => 'required|unique:ramadans' 
        ]);

        $this->ramadanRepository->createRamadan($request); 
    }



    public function editRamadan($id)
    {   

        return response()->json([
            'status'=>200,
            'ramadann'=>$this->ramadanRepository->editRamadan($id)
        ]);

    }


    public function updateRamadan($request)
    {

        $request -> validate([
            'stime' => 'required|unique:ramadans', 
            'etime' => 'required|unique:ramadans' 
        ]);

        $this->ramadanRepository->updateRamadan($request); 
    }


    public function deleteRamadan($id)
    {
        return $this->ramadanRepository->deleteRamadan($id); 
    }


}