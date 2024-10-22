<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;

class Analytics extends Controller
{
  public function index()
  {
    return view('content.dashboard.dashboards-analytics');
  }

  public function userAdmins(User $user)
  {
    // Cek apakah data total users sudah ada di Memcached
    $current_total_users = cache()->get('current_total_users');
    if (!$current_total_users) {
      $current_total_users = User::count();
      // Simpan ke Memcached selama 1 menit (60 detik)
      cache()->put('current_total_users', $current_total_users, 60);
    }

    // Cek apakah data verified users sudah ada di Memcached
    $verified_users = cache()->get('verified_users');
    if (!$verified_users) {
      $verified_users = User::whereNotNull('email_verified_at')->count();
      // Simpan ke Memcached selama 1 menit (60 detik)
      cache()->put('verified_users', $verified_users, 60);
    }

    // Cek apakah data pending users sudah ada di Memcached
    $pendings_users = cache()->get('pendings_users');
    if (!$pendings_users) {
      $pendings_users = User::whereNull('email_verified_at')->count();
      // Simpan ke Memcached selama 1 menit (60 detik)
      cache()->put('pendings_users', $pendings_users, 60);
    }

    // Ambil semua data pengguna dari database
    $users = User::all();

    // Kembalikan view dengan semua variabel yang dibutuhkan
    return view('content.administrator.users', compact('users', 'verified_users', 'pendings_users', 'current_total_users'));
  }
}
