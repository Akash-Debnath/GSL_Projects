<?php
namespace App\Services;


use App\Repositories\PolicyRepository;

class PolicyService 
{

    /**
     * @var policyRepository
    */
    protected $policyRepository;


    /**
     * UserService constructor.
     * @param AttachmentRepository $policyRepository
     */
    public function __construct(PolicyRepository $policyRepository)
    {
        $this->policyRepository = $policyRepository;
    }

    public function getAllPolicy()
    {
        return $this->policyRepository->getAllPolicy();
    }


    public function deletePolicy($id)
    {
        return $this->policyRepository->deletePolicy($id); 
    }


    public function createPolicy($request)
    {

        $request -> validate([
            'policy_title' => 'required', 
            // 'file_name' => 'required|mimes:doc,pdf,docx'
        ]);

        $policyId = $this->policyRepository->createPolicy($request); 
        return $this->policyRepository->createPolicyfile($request,$policyId); 
    }


}