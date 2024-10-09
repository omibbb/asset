@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Pages')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="nav-align-top">
      <ul class="nav nav-pills flex-column flex-md-row mb-6">
        <li class="nav-item"><a class="nav-link" href="{{url('user/profile')}}"><i class="bx bx-user bx-sm me-1_5"></i> Account</a></li>
        <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-link-alt bx-sm me-1_5"></i> Manage Account</a></li>
      </ul>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-12 col-12">
          <div class="card-header">
            <h5 class="mb-1">Delete Account</h5>
            <p class="my-0 card-subtitle">Read carefully, once you delete your account. There is no going back</p>
          </div>

          <div class="card-body">
            <div class="mb-6 col-12 mb-0">
              <div class="alert alert-warning">
                <h5 class="alert-heading mb-1">Are you sure you want to delete your account?</h5>
                <p class="mb-0">Once you delete your account, there is no going back. Please be certain.</p>
              </div>
            </div>
            <form id="formAccountDeactivation" action="{{ route('current-user.destroy') }}" method="POST">
              @csrf
              @method('DELETE')
              <div class="form-check my-8 ms-2">
                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                <label class="form-check-label" for="accountActivation">I confirm my account deactivation</label>
              </div>
              <button type="submit" class="btn btn-danger deactivate-account" disabled>Deactivate Account</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script>
  const checkbox = document.getElementById('accountActivation');
  const button = document.querySelector('.deactivate-account');

  checkbox.addEventListener('change', function() {
    button.disabled = !this.checked; // Aktifkan tombol jika checkbox dicentang
  });
</script>
@endsection