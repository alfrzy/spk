<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
{
    $user = $request->user();

    // Hanya admin yang bisa mengubah role
    if ($user->role == 0) {
        return view('profile.edit', [
            'user' => $user,
            'roles' => [0 => 'Admin', 1 => 'Pembersih'], // Admin bisa memilih role
        ]);
    }

    return view('profile.edit', [
        'user' => $user,
        'roles' => [1 => 'Pembersih'], // Pembersih tidak bisa mengubah role
    ]);
}


    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
{
    $user = $request->user();

    // Validasi role hanya untuk admin
    $validated = $request->validated();
    if ($user->role == 0) { // Admin boleh mengubah role
        $validated['role'] = $request->role; // Perbarui role
    }

    $user->fill($validated);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();

    return Redirect::route('profile.edit')->with('status', 'profile-updated');
}


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
