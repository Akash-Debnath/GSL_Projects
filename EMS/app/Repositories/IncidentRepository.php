<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Models\Incident;

class IncidentRepository implements RepositoryInterface
{


    public function getAllIncident()
    {
        return Incident::paginate(20);
    }



    public function createIncident($data)
    {
        return Incident::create([ 'date' => $data->date, 'description' => $data->description])->save();
    }


    public function editIncident($id)
    {
        return Incident::where('id',$id)->first();
    }


    public function updateincident($request)
    {
        $data = $request->input('incidentId');
        return Incident::where('id', $data)->update(['date'=>$request->date, 'description'=>$request->description]);
    }


    public function deleteIncident($id)
    {
        return Incident::findorFail($id)->delete();
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