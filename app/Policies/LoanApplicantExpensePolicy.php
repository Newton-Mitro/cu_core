<?php

namespace App\Policies;

use App\Models\LoanApplicantExpense;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoanApplicantExpensePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LoanApplicantExpense $loanApplicantExpense): bool
    {
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LoanApplicantExpense $loanApplicantExpense): bool
    {
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LoanApplicantExpense $loanApplicantExpense): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LoanApplicantExpense $loanApplicantExpense): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LoanApplicantExpense $loanApplicantExpense): bool
    {
        return false;
    }
}
