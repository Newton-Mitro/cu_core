<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSavingsAccountRequest;
use App\Http\Requests\UpdateSavingsAccountRequest;
use App\Models\SavingsAccount;

class SavingsAccountController extends Controller
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
    public function store(StoreSavingsAccountRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SavingsAccount $savingsAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SavingsAccount $savingsAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSavingsAccountRequest $request, SavingsAccount $savingsAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SavingsAccount $savingsAccount)
    {
        //
    }
}
