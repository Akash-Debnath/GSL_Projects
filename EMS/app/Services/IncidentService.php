<?php
namespace App\Services;


use App\Repositories\IncidentRepository;

class IncidentService 
{

    /**
     * @var incidentRepository
    */
    protected $incidentRepository;


    /**
     * UserService constructor.
     * @param IncidentRepository $incidentRepository
     */
    public function __construct(IncidentRepository $incidentRepository)
    {
        $this->incidentRepository = $incidentRepository;
    }

    

    public function getAllIncident()
    {
        return $this->incidentRepository->getAllIncident();
    }



    public function createIncident($request)
    {

        $request -> validate([
            'description' => 'required', 
            'date' => 'required'
        ]);

        $this->incidentRepository->createIncident($request); 
    }


    public function editIncident($id)
    {   
        $data = $this->incidentRepository->editIncident($id);
        

        return response()->json([
            'status'=>200,
            'incident'=>$this->incidentRepository->editIncident($id)
        ]);
    }


    public function updateIncident($request)
    {

        $request -> validate([
            'date' => 'required', 
            'description' => 'required',  
        ]);

        $this->incidentRepository->updateIncident($request); 
    }


    public function deleteIncident($id)
    {
        return $this->incidentRepository->deleteIncident($id); 
    }


}