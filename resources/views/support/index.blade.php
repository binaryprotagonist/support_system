@extends('layouts.app')
@push('header_styles')
<link href="{{ asset('css/dataTables/dataTables.bootstrap.css" rel="stylesheet') }}">
<link rel="stylesheet" href="{{ asset('css/dataTables/dataTables.responsive.css') }}" />
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{__('All Tickets') }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Ticket
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <div class="col-lg-12">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Reported By</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($tickets) > 0) { $i=1;?>
                                            @foreach ($tickets as $key=>$val)
                                            <tr class="success">
                                               <td>{{$i}}</td>
                                               <td>{{$val->title}}</td>
                                               <td>{{$val->description}}</td>
                                               <td>{{$val->ticket_status->status }}</td>
                                               <td>{{ $val->ticket_client->name }}</td>
                                               <td></td>
                                               @php $i++; @endphp
                                            @endforeach
                                            </tr>
                                         <?php  } ?>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $tickets->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection
@push('footer_scripts')
<script src="{{ asset('js/dataTables/jquery.dataTables.min.js')}}"></script>
        <script src="{{ asset('js/dataTables/dataTables.bootstrap.min.js')}}"></script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

@endpush