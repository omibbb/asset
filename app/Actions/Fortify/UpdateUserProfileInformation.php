<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
            'notlp' => ['nullable', 'string', 'max:13'],
            'address' => ['nullable', 'string', 'max:255'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'notlp' => $input['notlp'],
                'address' => $input['address'],
            ])->save();
        }

        notify()->success('Profile updated successfully.');
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'notlp' => $input['notlp'],
            'address' => $input['address'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();

        notify()->success('Profile updated successfully and email verification link sent to your new email address.');
    }

    public function updateProfilePhoto(Request $request, User $user)
    {
        $request->validate([
            'profile_photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_photo')) {
            // Hapus foto profil lama jika ada
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            // Simpan foto profil baru
            $path = $request->file('profile_photo')->store('profile-photos', 'public');

            // Update profile photo path di database
            $user->update(['profile_photo_path' => $path]);

            // Notify success
            notify()->success('Profile photo updated successfully.', 'Success');
        } else {
            notify()->error('No profile photo found. Please try again.', 'Error');
        }

        return redirect()->back();
    }
}
