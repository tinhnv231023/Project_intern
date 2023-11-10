<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CompanyRepository;
use App\Models\Company;
use App\Http\Requests\CompaniesRequest;

class CompanyController extends Controller
{
    protected $repository;
   public function __construct(CompanyRepository $repository)
   {
       $this->repository = $repository;
   }
    public function index(Request $request)
    {
        $company = $this->repository->getAll();
        $companies = $this->repository->search($request);
        return view('layout_admin.companies.companies_list', compact('companies', 'company'));
    }
    public function create()
    {
        return view('layout_admin.companies.companies_create');
    }
    public function store(CompaniesRequest $request)
    {
        $this->repository->create($request);
        return redirect(route('companies.index'));
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $companies = $this->repository->getcompanies($id);
        return view('layout_admin.companies.companies_edit', compact('companies'));
    }
    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        return redirect(route('companies.index'));
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect()->back();
    }

}
