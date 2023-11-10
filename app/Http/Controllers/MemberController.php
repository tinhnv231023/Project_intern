<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    public function index()
    {
        $member = User::where('id_role', 3)->orderBy('created_at','desc')->paginate(10);
        return view('layout_admin.member.list_member',compact('member'));
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show($id)
    {
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}

