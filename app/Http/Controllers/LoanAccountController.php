<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanAccountRequest;
use App\Http\Requests\UpdateLoanAccountRequest;
use App\Models\LoanAccount;

class LoanAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanAccount $loanAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanAccount $loanAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanAccountRequest $request, LoanAccount $loanAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanAccount $loanAccount)
    {
        //
    }
}
