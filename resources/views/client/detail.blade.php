@extends('layouts.app')
@push('header_styles')
<style>
    .row {
  display: flex;
  flex-wrap: wrap;
  padding: 0 4px;
}
.column {
  flex: 20%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
}
</style>
@endpush
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ __('Ticket Details') }}</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Ticket
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">

                                <div class="form-group">
                                    <label>Title</label>
                                    <p>{{$ticket->title}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <p>{{$ticket->description}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <p>{{$ticket->ticket_status->status}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Assigned To</label>
                                    <p>{{$ticket->ticket_assigned_to->name}}</p>
                                </div>
                                <div class="form-group">
                                    <label>Attachments</label>
                                        <br>
                                        <div class="row">
                                        @forelse($ticket->ticketAttachments as $attachment)
                                        <div class="column"> <a href="{{asset('ticket_attachments/'.$attachment->attachment)}}" target="_blank"><img src="{{asset('ticket_attachments/'.$attachment->attachment)}}" width="150"
                                            height="150"></a>
                                        </div>
                                        @empty
                                        <p>No attachments</p>
                                        @endforelse
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
</div>
<!-- /#page-wrapper -->
@endsection