<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
class BranchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = Branch::all();
        return view ('branches.show_branch',compact('data'));
    }


    public function create()
    {
        return view('Branches.create_branch');
    }

    public function store(Request $request)
    {
        return redirect ('branches');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('Branches.edit_branch',compact('branch'));
    }

    public function update(Request $request, $id)
    {
        return redirect('branches');
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();
        return redirect('branches');
    }

}
