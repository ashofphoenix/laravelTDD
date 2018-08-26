<?php
namespace App\Repositories;


use App\Repositories\OneHourElectricityInterface as OneHourElectricityInterface;
use App\Models\OneHourElectricity;


class OneHourElectricityRepository implements OneHourElectricityInterface
{
    public $OneHourElectricity;


    function __construct(OneHourElectricity $OneHourElectricity) {
	$this->OneHourElectricity = $OneHourElectricity;
    }


    public function getAll()
    {
        return $this->OneHourElectricity->getAll();
    }


    public function find($id)
    {
        return $this->OneHourElectricity->where('panel_id',$id)->get();
    }


}