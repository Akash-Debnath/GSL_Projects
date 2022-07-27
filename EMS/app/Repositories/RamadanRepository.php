<?php

namespace App\Repositories;

use App\Models\Ramadan;

class RamadanRepository implements RepositoryInterface
{
    
    public function getAllRamadanList()
    {
       return Ramadan::paginate(20);
    }


    public function createRamadan($data)
    {
        return Ramadan::create([ 'stime' => $data->stime, 'etime' => $data->etime])->save();
    }


    public function editRamadan($id)
    {
        return Ramadan::where('id',$id)->first();
    }


    public function updateRamadan($request)
    {
        $data = $request->input('ramadanId');
        return Ramadan::where('id', $data)->update(['stime' => $request->stime, 'etime' => $request->etime]);
    }



    public function deleteRamadan($id)
    {
        return Ramadan::findorFail($id)->delete();
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