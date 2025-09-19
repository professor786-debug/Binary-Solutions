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
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="col-12 col-md-6 col-lg-12">
                                <div class="card">
                                    <form method="POST" action="{{ route('solutions.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Add Solution</h4>
                                        </div>

                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}">
                                                @error('title')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                                @error('description')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="course_name">Course</label>
                                                <input type="text" name="course_name" class="form-control"
                                                    value="{{ old('course_name') }}">
                                                @error('course_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="universty_name">University</label>
                                                <select name="universty_name" class="form-control">
                                                    <option value="">-- Select University --</option>
                                                    @foreach ($universities as $university)
                                                        <option value="{{ $university->name }}"
                                                            {{ old('universty_name') == $university->id ? 'selected' : '' }}>
                                                            {{ $university->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('universty_name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="year">Year</label>
                                                <select name="year" class="form-control">
                                                    <option value="">-- Select Year --</option>
                                                    @for ($year = 2005; $year <= now()->year; $year++)
                                                        <option value="{{ $year }}"
                                                            {{ old('year') == $year ? 'selected' : '' }}>
                                                            {{ $year }}</option>
                                                    @endfor
                                                </select>
                                                @error('year')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="country">Country</label>
                                                <select name="country" class="form-control">
                                                    <option value="">-- Select Country --</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->name }}"
                                                            {{ old('country') == $country->name ? 'selected' : '' }}>
                                                            {{ $country->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('country')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="city">City</label>
                                                <input type="text" name="city" class="form-control"
                                                    value="{{ old('city') }}">
                                                @error('city')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" name="slug" id="slug" class="form-control"
                                                    value="{{ old('slug') }}" readonly>
                                            </div>

                                            <div class="form-group">
                                                <label for="subject_area">Subject Area</label>
                                                <input type="text" name="subject_area" class="form-control"
                                                    value="{{ old('subject_area') }}">
                                                @error('subject_area')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="problem_statement">Problem Statement</label>
                                                <textarea name="problem_statement" class="form-control" rows="4">{{ old('problem_statement') }}</textarea>
                                                @error('problem_statement')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="keywords">Keywords (comma-separated)</label>
                                                <textarea name="keywords" class="form-control" rows="2">{{ old('keywords') }}</textarea>
                                                @error('keywords')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="source_code_path">Source Code (.zip)</label>
                                                <input type="file" name="source_code_path"
                                                    class="form-control-file form-control">
                                                @error('source_code_path')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="video_demo_path">Video Demo (.mp4)</label>
                                                <input type="file" name="video_demo_path"
                                                    class="form-control-file form-control" accept="video/mp4">
                                                @error('video_demo_path')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>


                                            <div class="form-group">
                                                <label for="walkthrough_path">Walkthrough (.pdf)</label>
                                                <input type="file" name="walkthrough_path"
                                                    class="form-control-file  form-control">
                                                @error('walkthrough_path')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="report_path">Report (.pdf)</label>
                                                <input type="file" name="report_path"
                                                    class="form-control-file form-control">
                                                @error('report_path')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="preview_image" class="form-label">Preview Image</label>
                                                <input class="form-control" type="file" id="preview_image"
                                                    name="preview_image" accept="image/*">

                                                @error('preview_image')
                                                    <small class="text-danger d-block mt-1">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="has_tutorial_session">Has Tutorial Session?</label>
                                                <select name="has_tutorial_session" class="form-control">
                                                    <option value="0"
                                                        {{ old('has_tutorial_session') == '0' ? 'selected' : '' }}>No
                                                    </option>
                                                    <option value="1"
                                                        {{ old('has_tutorial_session') == '1' ? 'selected' : '' }}>Yes
                                                    </option>
                                                </select>
                                                @error('has_tutorial_session')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" name="price" class="form-control"
                                                    value="{{ old('price') }}">
                                                @error('price')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="download_limit">Download Limit</label>
                                                <input type="number" name="download_limit" class="form-control"
                                                    value="{{ old('download_limit') }}">
                                                @error('download_limit')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="Draft"
                                                        {{ old('status') == 'Draft' ? 'selected' : '' }}>Draft</option>
                                                    <option value="Published"
                                                        {{ old('status') == 'Published' ? 'selected' : '' }}>Published
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fields = [
                'title',
                'course_name',
                'universty_name',
                'year',
                'country',
                'city'
            ];

            const slugInput = document.getElementById('slug');

            function slugify(text) {
                return text
                    .toString()
                    .toLowerCase()
                    .trim()
                    .replace(/[\s\W-]+/g, '-');
            }

            function generateSlug() {
                const parts = fields.map(id => {
                    const el = document.getElementsByName(id)[0];
                    return el ? slugify(el.value) : '';
                });
                slugInput.value = parts.filter(p => p).join('-');
            }

            fields.forEach(id => {
                const el = document.getElementsByName(id)[0];
                if (el) {
                    el.addEventListener('input', generateSlug);
                    el.addEventListener('change', generateSlug);
                }
            });

            generateSlug();
        });
    </script>

</body>

</html>
