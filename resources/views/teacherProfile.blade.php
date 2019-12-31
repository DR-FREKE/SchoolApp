@extends('layouts.app')

@section('content')

    <div class="container body" id="T-profile">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">teacher profile</div>

                    <div class="panel-body">
                        <div class="grid">
                            <div class="box box1">
                                {{ $profilename }} profile pix goes here
                            </div>
                            <div class="box profilebox">
                                <h4>This is {{ $profilename }} profile</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection