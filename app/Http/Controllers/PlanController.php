<?php

namespace App\Http\Controllers;

use App\Http\Services\PlanService;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //
    protected $planSerivce;
    public function __construct(PlanService $planSerivce)
    {
        $this->planSerivce = $planSerivce;
    }


    public function store(int $planID,int$companyid){
        $this->planSerivce->store($planID, $companyid);
        return redirect()->route('company.index');
    }
}
