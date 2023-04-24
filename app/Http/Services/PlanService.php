<?php

namespace App\Http\Services;


use App\Models\Company;
use Bpuig\Subby\Models\Plan;
use Bpuig\Subby\Models\PlanSubscription;
use  Bpuig\Subby\Traits\HasSubscriptions;
use Carbon\Carbon;

class PlanService
{
//    use  HasSubscriptions;
    public function store(int $planId, int $companyId)
    {
        $plan = Plan::find($planId);
        $company = Company::find($companyId);
        //tim kiem theo $companyId
        $subscription = PlanSubscription::where('subscriber_id',$companyId)->get();
        // neu dk roi
        if(!$subscription ->isEmpty()){
            $subscription = PlanSubscription::find($subscription[0]->id);
            $subscription = $company->subscription('main');
            // đồng bộ hóa
           //$company->subscription('main')->syncPlan();
           //dd($company->subscription('main')->isOnTrial());
           //thay đổi kế hoạch
            $subscription->changePlan($plan, false);
        }else{ //chua dk
            $company->newSubscription(
               'main', // identifier tag of the subscription. If your application offers a single subscription, you might call this 'main' or 'primary'
                $plan, // Plan or PlanCombination instance your subscriber is subscribing to
                $company->name, // Human-readable name for your subscription
                'Customer main subscription', // Description
                null, // Start date for the subscription, defaults to now()
                'free' // Payment method service defined in config
            );
        }


    }
    public function listCompanySub(){
       $companies = Company::all();
//       dd($companies);
        $arrCompanySub = [];
       foreach ($companies as $company){
           $subscription = PlanSubscription::where('subscriber_id',$company->id)->get();
           array_push($arrCompanySub,$subscription);
       }
       return $arrCompanySub;

    }
    public function all()
    {
        return Plan::all();
    }
}
