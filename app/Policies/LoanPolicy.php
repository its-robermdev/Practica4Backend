<?php

namespace App\Policies;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoanPolicy
{
    // Bibliotecario puede acceder al historial de prestamos general, docente y estudiantes solo al de ellos
    // Estudiantes y docentes pueden crear un préstamo
    // Bibliotecario registra que se devolvió un libro


    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasAnyRole(['bibliotecario', 'estudiante', 'docente']);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAnyRole(['estudiante', 'docente']);
    }
    public function returnLoan(User $user, Loan $loan): bool
    {
        return $user->hasRole('bibliotecario');
    }
}
