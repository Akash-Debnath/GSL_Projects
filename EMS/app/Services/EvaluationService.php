<?php
namespace App\Services;

use App\Repositories\EvaluationRepository;

class EvaluationService 
{

    /**
     * @var evaluationRepository
    */
    protected $evaluationRepository;


    /**
     * UserService constructor.
     * @param evaluationRepository $evaluationRepository
     */
    public function __construct(EvaluationRepository $evaluationRepository)
    {
        $this->evaluationRepository = $evaluationRepository;
    }



    public function getEmployeeInfo($id)
    {
        return $this->evaluationRepository->getEmployeeInfo($id); 
    }




    public function createEvaluation($request)
    {

        $request -> validate([
            'emp_id' => 'required',  
            'eve_from' => 'required', 
            'eve_to' => 'required'
        ]);

        $this->evaluationRepository->createEvaluation($request); 
    }

}