<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Binary - Admin Dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

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
                                        <h4>Custom Solutions</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table  table-striped" id="table-1">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Student</th>
                                                        <th>File</th>
                                                        <th>Description</th>
                                                        <th>Step</th>
                                                        <th>Status</th>
                                                        <th>Solution File</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($customSolutions as $solution)
                                                        <tr>
                                                            <td>{{ $solution->id }}</td>

                                                            <!-- Student Name + WhatsApp -->
                                                            <td>
                                                                @if ($solution->student)
                                                                    <div class="d-flex flex-column">
                                                                        <div>
                                                                            <strong>{{ $solution->student->name }}</strong>
                                                                            @if ($solution->student->phone_number)
                                                                                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $solution->student->phone_number) }}"
                                                                                    target="_blank"
                                                                                    class="text-success ml-2 whatsapp-icon"
                                                                                    title="Chat on WhatsApp">
                                                                                    <i class="fab fa-whatsapp"></i>
                                                                                </a>
                                                                            @endif
                                                                        </div>
                                                                        @if ($solution->student->phone_number)
                                                                            <small
                                                                                class="text-muted">{{ $solution->student->phone_number }}</small>
                                                                        @endif
                                                                    </div>
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>

                                                            <!-- File Preview -->
                                                            <td>
                                                                @php
                                                                    $ext = pathinfo(
                                                                        $solution->problem_file,
                                                                        PATHINFO_EXTENSION,
                                                                    );
                                                                    $isImage = in_array($ext, ['jpg', 'jpeg', 'png']);
                                                                @endphp
                                                                @if ($isImage)
                                                                    <img src="{{ asset($solution->problem_file) }}"
                                                                        alt="File" width="80"
                                                                        class="rounded shadow-sm">
                                                                @elseif($ext === 'pdf')
                                                                    <img src="{{ asset('admin/pdf-icon.png') }}"
                                                                        alt="PDF" width="40">
                                                                @elseif(in_array($ext, ['doc', 'docx']))
                                                                    <img src="{{ asset('admin/word-icon.png') }}"
                                                                        alt="Word" width="40">
                                                                @else
                                                                    <span>{{ $ext }}</span>
                                                                @endif
                                                            </td>

                                                            <!-- Description -->
                                                            <td>{{ $solution->problem_description }}</td>

                                                            <!-- Step Badge -->
                                                            <td>
                                                                @if ($solution->step == 1)
                                                                    <span class="badge badge-primary">Document
                                                                        Uploaded</span>
                                                                @elseif($solution->step == 2)
                                                                    <span class="badge badge-warning text-dark">Payment
                                                                        Waiting</span>
                                                                @elseif($solution->step == 3)
                                                                    <span class="badge badge-success">
                                                                        <i
                                                                            class="fas fa-check-circle mr-1"></i>Completed
                                                                    </span>
                                                                @endif
                                                            </td>

                                                            <!-- Status -->
                                                            <td><span
                                                                    class="badge badge-secondary">{{ ucfirst($solution->status) }}</span>
                                                            </td>

                                                            <!-- Solution File View or Upload -->
                                                            <td>
                                                                @if ($solution->solution_file)
                                                                    <a href="{{ asset($solution->solution_file) }}"
                                                                        target="_blank"
                                                                        class="btn btn-sm btn-outline-info">View</a>
                                                                @elseif($solution->step == 3)
                                                                    <form
                                                                        action="{{ route('admin.custom-solutions.upload-solution', $solution->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="file" name="solution_file"
                                                                            class="form-control mb-2" required>
                                                                        <button
                                                                            class="btn btn-sm btn-success w-100">Upload</button>
                                                                    </form>
                                                                @else
                                                                    <span>N/A</span>
                                                                @endif
                                                            </td>

                                                            <!-- Action: Show Upload Modal if step == 2 -->
                                                            <td>
                                                                @if ($solution->step == 2)
                                                                    <button class="btn btn-sm btn-success"
                                                                        data-toggle="modal"
                                                                        data-target="#uploadModal-{{ $solution->id }}">
                                                                        Upload Solution
                                                                    </button>
                                                                @else
                                                                    <span class="text-muted">N/A</span>
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <!-- Upload Modal -->
                                                        <div class="modal fade" id="uploadModal-{{ $solution->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="uploadModalLabel-{{ $solution->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="{{ route('admin.custom-solutions.upload-solution', $solution->id) }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="uploadModalLabel-{{ $solution->id }}">
                                                                                Upload Solution File for
                                                                                #{{ $solution->id }}</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="form-group">
                                                                                <label for="solution_file">Solution
                                                                                    File</label>
                                                                                <input type="file"
                                                                                    name="solution_file"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Cancel</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Upload</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
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
            <footer class="main-footer">
                <div class="footer-left">
                    <a href="">Binary</a></a>
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>
    <!-- General JS Scripts -->
    <script src="{{ asset('admin/js/app.min.js') }}"></script>

    <!-- JS Libraries -->
    <script src="{{ asset('admin/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/bundles/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('admin/js/page/datatables.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('admin/js/scripts.js') }}"></script>

    <!-- Custom JS File -->
    <script src="{{ asset('admin/js/custom.js') }}"></script>
</body>

</html>
