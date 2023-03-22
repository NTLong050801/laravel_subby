<?php

namespace App\Http\Services;

use App\Repositories\CompanyRepositoryEloquent;

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

}
