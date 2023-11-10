<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StoreRepository;
use App\Http\Requests\StoreRequest;
use App\Models\Store;


class StoreController extends Controller
{

    protected $repository;

    public function __construct(StoreRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $stores = $this->repository->getAll();
        return view('layout_admin.stores.stores_list', compact('stores'));
    }
    public function store(Request $request)
    {

    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {

    }
    public function getupdate(Request $request)
    {
        return $this->repository->update($request);
    }
    public function delete($id)
    {
        $store = Store::find($id);
        $store->delete();
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }

    public function getEdit(Request $request)
    {   
        $store = Store::find($request->id);     
        return json_encode((object)['store'=>$store]);
    }
}
