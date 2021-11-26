@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        @if(isset($report))
                            Edit your report
                        @else
                            Submit a report
                        @endif
                    </div>

                    <div class="card-body">
                        @if (session('session'))
                            <div class="alert alert-success" role="alert">
                                {{ session('session') }}
                            </div>
                        @endif

                        <form method="POST"
                              @if(isset($report))
                              action="{{ route('submit-a-report.update', $report->id) }}"
                              @else
                              action="{{ route('submit-a-report.store') }}"
                            @endif
                        >
                            @csrf

                            <div class="form-group row">
                                <label for="crime"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Describe crime/Incident') }}</label>

                                <div class="col-md-6">
                                    <textarea id="crime"
                                              name="crime"
                                              class="form-control"
                                              rows="5"
                                              autofocus>@if(isset($report)){{$report->crime}}@endif</textarea>

                                    @error('crime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="crimeTime"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Date/Time Occurred') }}</label>

                                <div class="col-md-6">
                                    @if(isset($report))
                                        <input type="datetime-local" name="crimeTime" min="2017-06-01T08:30"
                                               max="2022-06-30T16:30" value="{{$report->crimeTime}}">
                                    @else
                                        <input type="datetime-local" name="crimeTime" min="2017-06-01T08:30"
                                               max="2022-06-30T16:30" value="2021-06-30T16:30">
                                    @endif

                                    @error('crimeTime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="reportTime"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Date/Time Reported') }}</label>

                                <div class="col-md-6">
                                    @if(isset($report))
                                        <input type="datetime-local" name="reportTime" min="2017-06-01T08:30"
                                               max="2022-06-30T16:30" value="{{$report->reportTime}}">
                                    @else
                                        <input type="datetime-local" name="reportTime" min="2017-06-01T08:30"
                                               max="2022-06-30T16:30" value="2021-06-30T16:30">
                                    @endif

                                    @error('reportTime')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">Location</div>
                                <label for="district"
                                       class="col-md-4 col-form-label text-md-right">{{ __('District') }}</label>

                                <div class="col-md-6">
                                    <select name="district">
                                        <option>District 1</option>
                                        <option>District 2</option>
                                    </select>
                                </div>
                                <label for="thana"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Thana') }}</label>

                                <div class="col-md-6">
                                    <select name="thana">
                                        <option>Thana 1</option>
                                        <option>Thana 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="report-time"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Adress') }}</label>

                                <div class="col-md-6">
                                   <textarea name="address"
                                             class="form-control"
                                             rows="5"
                                             autofocus></textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit Report') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
