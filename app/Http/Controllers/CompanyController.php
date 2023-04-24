<?php

namespace App\Http\Controllers;

use App\Http\Services\CompanyService;
use App\Http\Services\PlanService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;
    protected $planService;

    public function __construct(CompanyService $companyService, PlanService $planService)
    {
        $this->companyService = $companyService;
        $this->planService = $planService;
    }

    public function index()
    {
        //
        $companies = $this->companyService->index();
        $plans = $this->planService->all();
        //  $plansSub = $this->planService->listCompanySub();
//        $this->companyService->check(2);
        $listCompanySub  = $this->planService->listCompanySub();

        return view('company.index', compact('companies', 'plans','listCompanySub'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->companyService->create($request);
        return redirect()->route('company.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $company = $this->companyService->show($id);

        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $this->companyService->update($request, $id);
        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->companyService->destroy($id);
        return redirect()->route('company.index');
    }


}
