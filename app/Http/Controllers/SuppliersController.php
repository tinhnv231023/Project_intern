<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SupplierRepository;
use App\Models\Supplier;
use App\Http\Requests\SupplierRequest;

class SuppliersController extends Controller
{
    protected $repository;
   public function __construct(SupplierRepository $repository)
   {
       $this->repository = $repository;
   }
    public function index(Request $request)
    {
        $supplier = $this->repository->getAll();
        $supplier = $this->repository->search($request);
        return view('layout_admin.supplier.supplier_list', compact('supplier'));
    }

    public function create()
    {
        return view('layout_admin.supplier.supplier_create');
    }

    public function store(SupplierRequest $request)
    {
        $this->repository->create($request);
        return redirect(route('supplier.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $supplier = $this->repository->getsupplier($id);
        return view('layout_admin.supplier.supplier_edit', compact('supplier'));
    }

    public function update(SupplierRequest $request, $id)
    {
        $this->repository->update($request, $id);
        return redirect(route('supplier.index'));
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect()->back();
    }
}
