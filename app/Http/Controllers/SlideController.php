<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\SlideRepository;
use App\Models\Slide;

class SlideController extends Controller
{ 
   protected $repository;

  public function __construct(SlideRepository $repository)
  {
      $this->repository = $repository;
  }

    public function index()
    {
        $slide = $this->repository->getAll();
        return view('layout_admin.slide.list_slide', compact('slide'));
    }

    public function create()
    {
        return view('layout_admin.slide.create_slide');
    }

    public function store(Request $request)
    {
        $this->repository->create($request);
        return redirect(route('slide.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $slide = $this->repository->getslide($id);
        return view('layout_admin.slide.edit_slide', compact('slide'));
    }
    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        return redirect(route('slide.index'));
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect(route('slide.index'));
    }
    public function getOn($id){
        $on=Slide::find($id);
        $on->status = Slide::statusOn;
        $on->save();
        return redirect()->back();
    }

    public function getOff($id){
        $off=Slide::find($id);
        $off->status = Slide::statusOff;
        $off->save();
        return redirect()->back();
    }
}
