<?php

namespace App\Http\Services;

use App\Repositories\CompanyRepositoryEloquent;
use App\Models\Company;
use Bpuig\Subby\Models\PlanSubscription;

class CompanyService
{
    protected $companyRp ;
    public function __construct(CompanyRepositoryEloquent $companyRepositoryEloquent)
    {
       return $this->companyRp = $companyRepositoryEloquent;
    }
    public function index(){
        return $this->companyRp->all();
    }
    public function store($request){
        return $this->companyRp->create($request->input());
    }

    public function create( $request)
    {
       return $this->companyRp->create($request->input());
    }

    public function destroy(string $id)
    {
        return $this->companyRp->delete($id);
    }

    public function show(string $id)
    {
        return $this->companyRp->find($id,['*']);
    }

    public function update( $request, string $id)
    {
        return $this->companyRp->update($request->input(),$id);
    }
    public function check($id){
        // Get user subscriptions
        $company = Company::find($id);
//        $subscription = $company->subscription();
         return $company->subscription('main')->isActive();
    }
}
