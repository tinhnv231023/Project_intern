<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewRepository;
use App\Models\News;

class NewsController extends Controller
{
    protected $repository;

    public function __construct(NewRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {

        $the_news = $this->repository->getAll();
        return view('layout_admin.thenew.list_new', compact('the_news'));
    }

    public function getDetail($id)
    {

        $new_content = $this->repository->getContent($id);
        return view('layout_admin.thenew.content', compact('new_content'));
    }
    public function create()
    {
        return view('layout_admin.thenew.create_new');
    }
    public function store(Request $request)
    {
        $this->repository->create($request);
        return redirect(route('thenews.index'));
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $the_news = $this->repository->getNews($id);
        return view('layout_admin.thenew.edit_new', compact('the_news'));
    }
    public function update(Request $request, $id)
    {
        $this->repository->update($request, $id);
        return redirect(route('thenews.index'));
    }

    public function destroy($id)
    {
        $this->repository->destroy($id);
        return redirect()->back();
    }

    public function getOnNews($id)
    {
        $on = News::find($id);
        $on->status = News::statusOn;
        $on->save();
        return redirect()->back();
    }

    public function getStopNews($id)
    {
        $off = News::find($id);
        $off->status = News::statusOff;
        $off->save();
        return redirect()->back();
    }
}
