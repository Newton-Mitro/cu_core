<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanApprovalRequest;
use App\Http\Requests\UpdateLoanApprovalRequest;
use App\Models\LoanApproval;

class LoanApprovalController extends Controller
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
    public function store(StoreLoanApprovalRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LoanApproval $loanApproval)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LoanApproval $loanApproval)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoanApprovalRequest $request, LoanApproval $loanApproval)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LoanApproval $loanApproval)
    {
        //
    }
}
