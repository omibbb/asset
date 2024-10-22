<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class CustomAuthController extends Controller
{
    public function destroy(Request $request, User $user): RedirectResponse
    {
        $user = $request->user();
        // Hapus foto profil dari penyimpanan
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }
        $user->tokens->each->delete();
        $user->delete();

        // Check if user succes destroy account
        if ($user) {
            notify()->success('Your account has been deleted.');
            return redirect()->route('/');
        } else {
            notify()->error('Failed to delete your account.');
            return redirect()->route('/user/profile');
        }
    }
}
