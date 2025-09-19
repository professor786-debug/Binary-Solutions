<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Binary - Admin Dashboard</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">

  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.ico') }}" />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('admin.header');
      <div class="main-sidebar sidebar-style-2">
      @include('admin.sidebar');
      </div>
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Students</h4>
                    <a href="{{ route('solutions.create') }}" class="btn btn-primary">Add Student</a>
                  </div>
                              @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
    
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Subscription</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $index => $student)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>
                                    @if($student->is_verified)
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-danger">Unverified</span>
                                    @endif
                                </td>
                                <td>
                                @if($student->subscription_id)
                                    @php
                                        $planNames = [
                                            1 => 'Starter',
                                            2 => 'Pro',
                                            3 => 'Unlimited'
                                        ];
                                        $planName = $planNames[$student->subscription_id] ?? 'Unknown';
                                    @endphp
                                    <span class="badge badge-info">{{ $planName }}</span>
                                @else
                                    <span class="badge badge-secondary">No Subscription</span>
                                @endif
                            </td>

                                <td>
                                    {{-- Actions --}}
                                    <a href="{{ route('student.edit', $student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('student.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<script src="{{ asset('admin/js/app.min.js') }}"></script>

<script src="{{ asset('admin/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>

<script src="{{ asset('admin/js/page/datatables.js') }}"></script>

<script src="{{ asset('admin/js/scripts.js') }}"></script>

<script src="{{ asset('admin/js/custom.js') }}"></script>
</body>


</html>