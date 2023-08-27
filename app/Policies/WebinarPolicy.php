<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Webinar;

class WebinarPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Allow any user to view any webinar
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Webinar $webinar): bool
    {
        return true; // Allow any user to view a specific webinar
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true; // Allow any authenticated user to create webinars
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Webinar $webinar): bool
    {
        return $user->id === $webinar->user_id; // Allow only the owner of the webinar to update
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Webinar $webinar): bool
    {
        return $user->id === $webinar->user_id; // Allow only the owner of the webinar to delete
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Webinar $webinar): bool
    {
        return false; // Webinars are not restorable in this example
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Webinar $webinar): bool
    {
        return false; // Webinars are not permanently deletable in this example
    }
}
