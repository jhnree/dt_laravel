@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <div class="card image mt-5 border-0 rounded-0">
                <div class="container-fluid px-4">
                    <div class="row">
                        <div class="col-5 my-3">
                            {{-- <span class="card-title d-block" id="day">{{$now->isoFormat('dddd')}}</span> --}}
                            <span class="card-title d-block" id="day"></span>
                            {{-- <span class="card-text" id="dat">{{$now->isoFormat('MMMM D, YYYY')}}</span> --}}
                            <span class="card-text" id="date"></span>
                        </div>
                        <div class="col-6 text-right my-1 px-0">
                            {{-- <span class="card-title d-block" id="hour">{{$hours}}</span> --}}
                            <span class="card-title d-block" id="hour"></span>
                        </div>
                        <div class="col-1 my-4 px-0">
                            {{-- <span id="seconds" class="d-block">{{$seconds}}</span> --}}
                            <span id="seconds" class="d-block"></span>
                            {{-- <span class="card-text d-block" id="ampm">{{$now->isoFormat('a')}}</span> --}}
                            <span class="card-text d-block" id="ampm"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow mt-3 border-0 rounded-0">
                <div class="container-fluid px-4 py-4">
                    <form method="get" id="timeentry">
                        @csrf
                        <div class="form-group">
                            <button class="btn calendar form-control rounded-0" type="button" id="datetimepicker">
                                <label for="datepicker">
                                    <i class="text-white pe-7s-date pe-lg"></i>
                                </label>
                                <input id="datepicker" class="text-center text-white" type="text" name="datepicker">
                            </button>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input id="location" class="form-control rounded-0" type="text" name="location" placeholder="Location">
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-0" id="my-addon">
                                        <i class="pe-7s-map-marker"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <select id="client" class="form-control mdb-select md-form rounded-0 dropdown-success" name="client">
                                    <option value="" disabled selected>Select Client</option>
                                    <option value="Aktus Global Management Inc.">Aktus Global Management Inc.</option>
                                    <option value="i4one Marketing">i4one Marketing</option>
                                    <option value="POF">POF</option>
                                </select>
                                <div class="input-group-append">
                                    <span class="input-group-text rounded-0" id="clientIcon">
                                        <i class="pe-7s-portfolio"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        @php
                          $isTimein = true;
                          $hasWeeklyForecast = true;
                          $hasNBT = true;
                        @endphp
                        @if ($isTimein == true)
                            @if ($hasWeeklyForecast == true)
                                <button class="btn form-control rounded-0 mybutton" id="timein" time="in" type="submit">
                                    Save Time-in
                                </button>
                            @else
                                <div class="form-control rounded-0 error-div">
                                    <span>No Forecast Found!</span>
                                </div>
                            @endif
                        @else
                            @if ($hasWeeklyForecast == true)
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button class="btn btn-dark form-control mybutton rounded-0" time="inBetween" type="submit">Save in-Between</button>
                                    </div>
                                    @if ($hasNBT == true)
                                            <div class="col-lg-6">
                                                <button class="btn btn-dark form-control rounded-0 mybutton" time="out" type="submit">Save Time-Out</button>
                                            </div>
                                        </div>
                                    @else
                                            <div class="col-lg-6">
                                                <button class="btn btn-dark form-control rounded-0 mybutton" type="out" disabled>Save Time-Out</button>
                                            </div>
                                        </div>
                                        <div class="form-control rounded-0 error-div mt-2">
                                            <span>You have unsubmitted NBT!</span>
                                        </div>
                                    @endif
                            @else
                            <div class="form-control rounded-0 error-div">
                                    <span>No Forecast Found!</span>
                                </div>
                            @endif
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection