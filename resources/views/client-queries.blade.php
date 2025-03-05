@extends('adminlte::page')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Clients Queries Record</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Client Queries</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Nationality</th>
                                    <th>Business Activity</th>
                                    <th>Plan To Start</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($client_queries) > 0)
                                    @foreach($client_queries as $index => $queries)
                                        <tr class="align-middle">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $queries->name }}</td>
                                            <td>{{ $queries->email }}</td>
                                            <td>{{ $queries->phone }}</td>
                                            <td>{{ $queries->nationality }}</td>
                                            <td>{{ $queries->business_activity }}</td>
                                            <td>{{ $queries->plan_to_start }}</td>
                                            <td>{{ date('Y-m-d', strtotime($queries->created_at)) }}</td>
                                            <td>
                                                <button class="btn btn-primary btn-sm view-details"
                                                        data-id="{{ $queries->id }}"
                                                        data-name="{{ $queries->name }}"
                                                        data-email="{{ $queries->email }}"
                                                        data-phone="{{ $queries->phone }}"
                                                        data-nationality="{{ $queries->nationality }}"
                                                        data-business_activity="{{ $queries->business_activity }}"
                                                        data-plan_to_start="{{ $queries->plan_to_start }}"
                                                        data-date="{{ date('Y-m-d', strtotime($queries->created_at)) }}"
                                                        data-message="{{ $queries->message }}"
                                                        data-toggle="modal"
                                                        data-target="#clientDetailModal">
                                                    View
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="align-middle">
                                        <td colspan="9">No Record Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            {!! $client_queries->links() !!}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>

    <!-- Client Detail Modal -->
    <div class="modal fade" id="clientDetailModal" tabindex="-1" role="dialog" aria-labelledby="clientDetailModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clientDetailModalLabel">Client Query Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> <span id="modal-name"></span></p>
                    <p><strong>Email:</strong> <span id="modal-email"></span></p>
                    <p><strong>Phone No:</strong> <span id="modal-phone"></span></p>
                    <p><strong>Nationality:</strong> <span id="modal-nationality"></span></p>
                    <p><strong>Business Activity:</strong> <span id="modal-business_activity"></span></p>
                    <p><strong>Plan To Start:</strong> <span id="modal-plan_to_start"></span></p>
                    <p><strong>Date:</strong> <span id="modal-date"></span></p>
                    <p><strong>Message:</strong> <span id="modal-message"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('adminlte_js')
    <script>
        $(document).ready(function () {
            $(".view-details").click(function () {
                let name = $(this).data("name");
                let email = $(this).data("email");
                let phone = $(this).data("phone");
                let nationality = $(this).data("nationality");
                let business_activity = $(this).data("business_activity");
                let plan_to_start = $(this).data("plan_to_start");
                let date = $(this).data("date");
                let message = $(this).data("message");

                $("#modal-name").text(name);
                $("#modal-email").text(email);
                $("#modal-phone").text(phone);
                $("#modal-nationality").text(nationality);
                $("#modal-business_activity").text(business_activity);
                $("#modal-plan_to_start").text(plan_to_start);
                $("#modal-date").text(date);
                $("#modal-message").text(message);
            });
        });
    </script>
@endsection
