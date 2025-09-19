<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard - Admin Dashboard</title>

  <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/bundles/bootstrap-social/bootstrap-social.css') }}">
  
  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
  
  <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
  <link rel='shortcut icon' type='image/x-icon' href="{{ asset('admin/img/favicon.ico') }}" />
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
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">
                    <form method="POST" action="{{ route('student.update', $student->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Edit Student</h4>
                        </div>

                        <div class="card-body">

                            <div class="form-group">
                                <label for="name">Student Name</label>
                                <input type="text" name="name" value="{{ old('name', $student->name) }}" class="form-control">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" value="{{ old('email', $student->email) }}" class="form-control">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password <small class="text-muted">(Leave blank if not changing)</small></label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="is_verified">Verification Status</label>
                                <select name="is_verified" class="form-control">
                                    <option value="1" {{ old('is_verified', $student->is_verified) == '1' ? 'selected' : '' }}>Verified</option>
                                    <option value="0" {{ old('is_verified', $student->is_verified) == '0' ? 'selected' : '' }}>Unverified</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
<script src="{{ asset('admin/js/app.min.js') }}"></script>

<script src="{{ asset('admin/bundles/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ asset('admin/js/page/index.js') }}"></script>

<script src="{{ asset('admin/js/scripts.js') }}"></script>

<script src="{{ asset('admin/js/custom.js') }}"></script>

</body>

</html>