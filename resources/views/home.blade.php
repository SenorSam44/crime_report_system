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
                        @if(isset($reports))
                            @foreach($reports as $report)
                                <li>{{$reports->crime}}</li>
                            @endforeach
                        @else
                            No reports Submitted yet!
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
