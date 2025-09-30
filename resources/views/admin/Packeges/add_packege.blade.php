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
                                    <form method="POST" action="{{ route('package.store') }}">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Add Subscription Package</h4>
                                        </div>

                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="name">Package Name</label>
                                                <input type="text" name="name" value="{{ old('name') }}"
                                                    class="form-control">
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price (USD)</label>
                                                <input type="number" name="price" step="0.01"
                                                    value="{{ old('price') }}" class="form-control">
                                                @error('price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="duration">Duration (days)</label>
                                                <input type="number" name="duration" value="{{ old('duration') }}"
                                                    class="form-control" placeholder="e.g. 30">
                                                @error('duration')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="download_limit">Download Limit</label>
                                                <input type="number" name="download_limit"
                                                    value="{{ old('download_limit') }}" class="form-control"
                                                    placeholder="e.g. 3 or leave blank for unlimited">
                                                @error('download_limit')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="discount_percentage">Discount Percentage</label>
                                                <input type="number" name="discount_percentage"
                                                    value="{{ old('discount_percentage') }}" class="form-control"
                                                    placeholder="e.g. 10">
                                                @error('discount_percentage')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="one_on_one_sessions">One-on-One Sessions</label>
                                                <select name="one_on_one_sessions" class="form-control">
                                                    <option value="0"
                                                        {{ old('one_on_one_sessions') == '0' ? 'selected' : '' }}>No
                                                    </option>
                                                    <option value="1"
                                                        {{ old('one_on_one_sessions') == '1' ? 'selected' : '' }}>Yes
                                                    </option>
                                                </select>
                                                @error('one_on_one_sessions')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Package Description</label>
                                                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1"
                                                        {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                                    <option value="0"
                                                        {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        @if ($errors->any())
                                            <div style="color:red;">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                    </form>

                                </div>
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
