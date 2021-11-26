@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1 class="pb-4"> Your reports</h1>
                        <div class="row">
                            @if(isset($reports))
                                @foreach($reports as $report)
                                    <div class="border p-2 my-2 col-9">
                                        {{$report->crime}}
                                    </div>
                                    <div class="p-2 my-2 col-3">
                                        <a class="btn btn-info" href="{{ url('/submit-a-report/'.$report->id)}}">Edit</a>
                                        <a class="btn btn-danger" href="{{ url('/submit-a-report/delete')}}">Delete</a>
                                    </div>
                                @endforeach
                            @else
                                No reports Submitted yet!
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
