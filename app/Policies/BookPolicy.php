<?php

namespace App\Policies;

use App\Models\Book;
use App\Models\User;

class BookPolicy
{
    /**
     * Determine whether the user can view any books.
     */
    public function viewAny(User $user)
    {
        return true; // Allow all authenticated users
    }

    /**
     * Determine whether the user can view a book (Only owner can).
     */
    public function view(User $user, Book $book)
    {
        return $user->id === $book->user_id; // Only the owner can view
    }

    public function show(User $user, Book $book){
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can create a book.
     */
    public function create(User $user)
    {
        return true; // Any logged-in user can create books
    }

    /**
     * Determine whether the user can update a book (Only owner can).
     */
    public function update(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }
     
    public function edit(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can delete a book (Only owner can).
     */
    public function delete(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can restore a book.
     */
    public function restore(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }

    /**
     * Determine whether the user can permanently delete a book.
     */
    public function forceDelete(User $user, Book $book)
    {
        return $user->id === $book->user_id;
    }
}
