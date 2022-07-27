<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Models\Policy;
use App\Models\PolicyFile;

class PolicyRepository implements RepositoryInterface
{


    public function getAllPolicy()
    {
        return $policies = Policy::with('policyFile')->orderBy('id', 'DESC')->paginate(20);
    }



    public function createPolicy($data)
    {
        $policy = Policy::create(['policy_title' => $data->policy_title]);
        return  $policy->id;
    }



    public function deletePolicy($id)
    {
        $policy = Policy::findorFail($id);
        return $policy->delete();
    }



    public function createPolicyfile($data,$policyId)
    {   
        if($data->hasfile('file_name'))
        {  
            $file = $data->file('file_name');
            $name = time().rand(1,100).'.'.$file->extension();
            $file->move(public_path('PolicyFiles'), $name);  
            $policy= new PolicyFile();
            $policy->file_name =  $name; 
            $policy->policy_id =  $policyId; 
            $policy->save();  
        }
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