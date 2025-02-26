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
{{--                        <div class="card-header"><h3 class="card-title">Clients Queries Record</h3></div>--}}
                        <!-- /.card-header -->
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
                                    <th>Message</th>
{{--                                    <th style="width: 40px">Label</th>--}}
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($client_queries) > 0)
                                    @foreach($client_queries as $queries)
                                        <tr class="align-middle">
                                            <td>1.</td>
                                            <td>{{ $queries->name }}</td>
                                            <td>{{ $queries->email }}</td>
                                            <td>{{ $queries->phone }}</td>
                                            <td>{{ $queries->nationality }}</td>
                                            <td>{{ $queries->business_activity }}</td>
                                            <td>{{ $queries->plan_to_start }}</td>
                                            <td>{{ $queries->message }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr class="align-middle">
                                        <td colspan="7">No Record Found</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
{{--                        <div class="card-footer clearfix">--}}
{{--                            <ul class="pagination pagination-sm m-0 float-end">--}}
{{--                                <li class="page-item"><a class="page-link" href="#">«</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                <li class="page-item"><a class="page-link" href="#">»</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
    <!-- /.Main content -->
@endsection
