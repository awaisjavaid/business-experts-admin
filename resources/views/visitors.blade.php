@extends('adminlte::page')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Visitor Tracker List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Visitor Tracker</li>
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
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
{{--                                    <th>IP Address</th>--}}
                                    <th>Country</th>
                                    <th>City</th>
{{--                                    <th>Browser</th>--}}
                                    <th>Device</th>
                                    <th>Page</th>
                                    <th>Visited At</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($visitors) > 0)
                                    @foreach($visitors as $visitor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
{{--                                            <td>{{ $visitor->ip_address }}</td>--}}
                                            <td>{{ $visitor->country }}</td>
                                            <td>{{ $visitor->city }}</td>
{{--                                            <td>{{ $visitor->browser }}</td>--}}
                                            <td>{{ $visitor->device }}</td>
                                            <td><a href="{{ $visitor->page }}" target="_blank" style="color: #DF0A0A;">{{ $visitor->page }}</a></td>
                                            <td>{{ $visitor->visited_at }}</td>
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

                        <div class="card-footer clearfix">
                            {!! $visitors->links() !!}
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>
    <!-- /.Main content -->
@endsection
