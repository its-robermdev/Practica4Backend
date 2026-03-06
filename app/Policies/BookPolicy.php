<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{

    // La lista y el detalle de libros es público, pero solo los bibliotecarios pueden modificar libros (crear, actualizar, eliminar)

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Book $book): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasRole('bibliotecario');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Book $book): bool
    {
        return $user->hasRole('bibliotecario');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Book $book): bool
    {
        return $user->hasRole('bibliotecario');
    }
}
