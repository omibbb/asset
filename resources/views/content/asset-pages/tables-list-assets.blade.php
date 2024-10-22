@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Asset List')

@section('content')
<!-- List of Assets -->
<div class="card">
  <h5 class="card-header pb-0 text-md-start text-center">List of Assets</h5>
  <div class="table-responsive card-datatable text-nowrap">
    <table class="table table-bordered text-center">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Code</th>
          <th>Location</th>
          <th>Registration Date</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if (!empty($assets))
        <tr>
          <td colspan="7">No Data</td>
        </tr>
        @else
        @foreach($assets as $asset)
        <tr>
          <td>{{ $asset->name }}</td>
          <td>{{ $asset->description }}</td>
          <td>{{ $asset->code }}</td>
          <td>{{ $asset->location ?? 'Unknown' }}</td>
          <td>{{ $asset->created_at->format('d M Y') }}</td>
          <td>{{ $asset->status ?? 'Available' }}</td>
          <td>
            <a href="{{ route('assets.view', $asset->id) }}" class="btn btn-info btn-sm">View</a>
            <a href="#" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
<!--/ List of Assets -->
@endsection