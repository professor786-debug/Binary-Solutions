<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Binary - Admin Dashboard</title>

    <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/img/favicon.ico') }}" />
    <style>
        .butns {
            display: flex;
            gap: 3px;
        }
    </style>
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
                                        <h4>Package</h4>
                                        <a href="{{ route('package.create') }}" class="btn btn-primary">Add Package</a>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">#</th>
                                                        <th>Title</th>
                                                        <th>Price</th>
                                                        <th>Download Limit</th>
                                                        <th>Discount (%)</th>
                                                        <th>1-on-1 Session</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Created At</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($packages as $index => $package)
                                                        <tr>
                                                            <td class="text-center">{{ $index + 1 }}</td>
                                                            <td>{{ $package->name }}</td>
                                                            <td>{{ number_format($package->price) }} USD</td>
                                                            <td>{{ $package->download_limit ?? 'Unlimited' }}</td>
                                                            <td>{{ $package->discount_percentage ?? 0 }}%</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-{{ $package->one_on_one_sessions ? 'success' : 'secondary' }}">
                                                                    {{ $package->one_on_one_sessions ? 'Yes' : 'No' }}
                                                                </span>
                                                            </td>
                                                            <td>{{ Str::limit($package->description, 40) }}</td>
                                                            <td>
                                                                <span
                                                                    class="badge badge-{{ $package->status == 1 ? 'success' : 'danger' }}">
                                                                    {{ $package->status == 1 ? 'Active' : 'Inactive' }}
                                                                </span>
                                                            </td>
                                                            <td>{{ $package->created_at->format('d-m-Y') }}</td>
                                                            <td class="butns">
                                                                <a href="{{ route('package.edit', $package->id) }}"
                                                                    class="btn btn-sm btn-primary">Edit</a>
                                                                <form
                                                                    action="{{ route('package.destroy', $package->id) }}"
                                                                    method="POST" style="display:inline-block;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('Are you sure you want to delete this package?')">Delete</button>
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
