<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calcTax($salary,$currentTax=0.5){
        return floor($salary * $currentTax);
    }
    public function netSalary($salary){
        return $salary - $this->calcTax($salary);
    }

    public function index()
    {
        // $users = User::where('salary','>',10000)->where('nation','jp')->where('gender','male')->orderBy('salary','desc')->get();
        // $users = User::whereIn('nation',['mm','jp'])->where('gender','male')->where('salary','>',5000)->get();
        $users = User::where('nation','mm')->paginate(5)->through(function($user){
            $user->tax = $this->calcTax($user->salary);
        $user->netsalary = $this->netSalary($user->salary);
        return $user;
        });
        return $users;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
