<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense_type;

class ExpenseTypeController extends Controller
{
    public function index(){
        $expense_types = Expense_type::where('status','1')->orderBy('name','asc')->get();
        return view('expense_type.index',compact('expense_types'));
    }

    public function store(Request $request){
        Expense_type::create([
            'name'=>$request->expense_type,
            'branch_id'=>1,
            'status'=>1,
        ]);
        return back()->with('success','ok');
    }

    public function update(Request $request, Expense_type $expense_type){
        // dd($request);
        $expense_type->name = $request->expense_type;
        $expense_type->update();
        return back()->with('success','ok');
    }

    public function destroy(Expense_type $expense_type){
        $expense_type->delete();
        return back()->with('success','ok');
    }
}
