@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings')

@section('page-script')
@vite(['resources/assets/js/pages-account-settings-account.js'])
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="nav-align-top">
            <ul class="nav nav-pills flex-column flex-md-row mb-6">
                <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-sm bx-user me-1_5"></i> Account</a></li>
                <li class="nav-item"><a class="nav-link" href="{{url('user/account-session')}}"><i class="bx bx-sm bx-link-alt me-1_5"></i> Manage Account</a></li>
            </ul>
        </div>
        <div class="card mb-6">
            <!-- Account -->
            <div class="card-body">
                <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="d-flex align-items-start align-items-sm-center gap-6 pb-4 border-bottom">
                        @if(auth()->user()->profile_photo_path)
                        <!-- Jika ada foto profil -->
                        <img src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        @else
                        <!-- Jika tidak ada foto profil -->
                        <img src="{{ auth()->user()->profile_photo_url }}" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        @endif
                        <div class="button-wrapper">
                            <label for="profile_photo" class="btn btn-primary me-3 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="profile_photo" name="profile_photo" class="account-file-input" hidden accept="image/png, image/jpeg, image/jpg" />
                            </label>

                            <button type="submit" class="btn btn-outline-secondary mb-4">
                                <i class="bx bx-save d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Save Photo</span>
                            </button>

                            <div>Allowed JPG, GIF, or PNG. Max size of 800K</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="card-body pt-4">
                <form id="formAccountSettings" method="POST" action="{{ route('user-profile-information.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row g-6">
                        <div class="col-md-6">
                            <label for="name" class="form-label">{{__('Full Name')}}</label>
                            <input class="form-control" type="text" id="name" name="name" value="{{ Auth::user()->name }}" autofocus />
                        </div>
                        <div class="col-md-6">
                            <label for="username" class="form-label">{{__('Username')}}</label>
                            <input class="form-control" type="text" name="username" id="username" value="{{ Auth::user()->username }}" readonly />
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input class="form-control" type="email" id="email" name="email" value="{{ Auth::user()->email }}" placeholder="your@example_email.com" />
                        </div>
                        <div class="col-md-6">
                            <label for="depart" class="form-label">Department</label>
                            <input type="text" class="form-control" id="depart" name="depart" value="{{ Auth::user()->depart }}" readonly />
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="notlp">Phone Number</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">IDN (+62)</span>
                                <input type="number" id="notlp" name="notlp" class="form-control" placeholder="82x-xxx-xxxx" value="{{ Auth::user()->notlp }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{ Auth::user()->address }}" />
                        </div>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-outline-primary me-3">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
</div>
@endsection