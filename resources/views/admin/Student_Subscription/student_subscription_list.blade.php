<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Binary - Admin Dashboard</title>

  <link rel="stylesheet" href="{{ asset('admin/css/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/datatables.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

  <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">

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
                  <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                          <tr>
                              <th class="text-center">#</th>
                              <th>Transaction ID</th>
                              <th>Student Name</th>
                              <th>Package</th>
                              <th>Amount</th>
                              <th>Subscription Period</th>
                              <th>Payment Method</th>
                              <th>Status</th>
                              <th>Created At</th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($subscriptions as $subscription)
                          <tr>
                              <td class="text-center">{{ $loop->iteration }}</td>
                              <td>{{ $subscription->stripe_charge_id ?? 'N/A' }}</td>
                              <td>
                                  {{ $subscription->student->name ?? 'Deleted User' }}
                                  @if($subscription->student)
                                      <br><small>{{ $subscription->student->email }}</small>
                                  @endif
                              </td>
                              <td>{{ $subscription->package->name ?? 'N/A' }}</td>
                              <td>{{ $subscription->amount }} {{ $subscription->currency }}</td>
                              <td>
                                  {{ \Carbon\Carbon::parse($subscription->start_date)->format('d-m-Y') }}<br>
                                  <strong>to</strong><br>
                                  {{ \Carbon\Carbon::parse($subscription->end_date)->format('d-m-Y') }}
                              </td>
                              <td>Stripe</td>
                              <td>
                                  @if($subscription->is_active)
                                      @if(now()->lt($subscription->end_date))
                                          <span class="badge badge-success">Active</span>
                                      @else
                                          <span class="badge badge-warning">Expired</span>
                                      @endif
                                  @else
                                      <span class="badge badge-secondary">Cancelled</span>
                                  @endif
                              </td>
                              <td>{{ $subscription->created_at->format('d-m-Y H:i') }}</td>
                              <td>
                                  <div class="btn-group">
                                      <a href="" 
                                        class="btn btn-sm btn-info" title="View">
                                          <i class="fas fa-eye"></i>
                                      </a>
                                      <button class="btn btn-sm btn-danger" title="Cancel"
                                              onclick="confirmDelete({{ $subscription->id }})">
                                          <i class="fas fa-times"></i>
                                      </button>
                                  </div>
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