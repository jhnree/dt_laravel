@extends('layout')

@section('content')
    <div class="container-fluid rpt-container">
        <div class="mb-2">
            <ul class="nav nav-tabs">
                <li id="btn-attendance" class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#attendance">Attendance</a>
                </li>
                <li id="btn-inBetween" class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#inBetween">In Between</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div id="attendance" class="container-fluid tab-pane active">
                <div class="card shadow p-4">
                    <form method="post" action="" id="generateForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group mb-3 mr-4">
                                <div class="input-group-append">
                                    <span class="input-group-text rpt-input" id="my-addon">From:</span>
                                </div>
                                    <input class="fromDatepicker form-control px-3 datepicker" type="text" name="from">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text rpt-input" id="my-addon">To:</span>
                                    </div>
                                    <input class="toDatepicker form-control px-3 datepicker" type="text" name="to">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <button id="generate" class="btn rounded-0 float-right" type="submit">
                                    Generate
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-light table-bordered table-striped" id="timeReport">
                            <thead>
                                <tr>
                                    <th rowspan="2">Date</th>
                                    <th colspan="3">Time In</th>
                                    <th colspan="3">Time out</th>
                                </tr>
                                <tr>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Location</th>
                                    <th>Time</th>
                                    <th>Client</th>
                                    <th>Location</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="inBetween" class="container-fluid tab-pane fade px-0">
                <div class="card shadow p-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group mb-3 mr-4">
                                <div class="input-group-append">
                                    <span class="input-group-text rpt-input">From:</span>
                                </div>
                                <input id="" class="form-control px-3 datepicker fromDatepicker" type="text">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text rpt-input">To:</span>
                                </div>
                                <input id="" class="form-control px-3 datepicker toDatepicker" type="text">
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <button id="generate" class="btn btn-primary rounded-0 float-right" type="button">
                                Generate
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                            <table class="table table-light table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Client</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>asdasdasd</td>
                                        <td>08:09 am</td>
                                        <td>Aktus Global Management Inc.</td>
                                        <td>PASIG</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
