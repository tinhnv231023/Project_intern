<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\BillRepository;
use App\Models\Bill;

class BillController extends Controller
{ 
   protected $repository;
  public function __construct(BillRepository $repository)
  {
      $this->repository = $repository;
  }
    public function index()
    {
        $bill = $this->repository->getAll();
        return view('layout_admin.bookbill.list_bill',compact('bill'));
    }
    public function NotReceived()
    {
        $bill = $this->repository-> getAllNotReceiving();
        return view('layout_admin.bookbill.order_not_received',compact('bill'));
    }
    public function  Received()
    {
        $bill = $this->repository-> getAllReceiving();
        return view('layout_admin.bookbill.order_received',compact('bill'));
    }

    public function Complete()
    {
        $bill = $this->repository-> getAllComplete();
        return view('layout_admin.bookbill.order_complete',compact('bill'));
    }

    public function Fails()
    {
        $bill = $this->repository-> getAllFail();
        return view('layout_admin.bookbill.order_fail',compact('bill'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        return view('layout_admin.bookbill.detail_bill');
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        //
    }
    public function getProcessing($id){
        $xl = Bill::find($id);
        $xl->status = Bill::processing;
        $xl->save();
        return redirect()->back();
    }

    public function getReceiving($id){
        $tn = Bill::find($id);
        $tn->status = Bill::receiving;
        $tn->save();
        return redirect()->back();
    }

    public function getDelivered($id){
        $dg = Bill::find($id);
        $dg->status = Bill::delivered;
        $dg->save();
        return redirect()->back();
    }
    public function getFail($id){
        $tb = Bill::find($id);
        $tb->status = Bill::fail;
        $tb->save();
        return redirect()->back();
    }
}