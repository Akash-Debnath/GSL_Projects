<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;
use App\Models\Holyday;

class HolidayRepository implements RepositoryInterface
{


    public function getAllHoliday()
    {
       return $holidays = Holyday::paginate(20);
    }


    public function searchHoliday($request)
    {
       $t = $request->input('date_year');
       return Holyday::whereYear('date',$t)->paginate(20);
    }



    public function createHoliday($data)
    {
        return Holyday::create([ 'date' => $data->date, 'description' => $data->description])->save();
    }


    public function editHoliday($id)
    {
        return Holyday::where('id',$id)->first();
    }


    public function updateHoliday($request)
    {

        $data = $request->input('holidayId');
        return Holyday::where('id', $data)->update(['date'=>$request->date, 'description'=>$request->description]);

    }


    public function deleteHoliday($id)
    {
        return Holyday::findorFail($id)->delete();
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