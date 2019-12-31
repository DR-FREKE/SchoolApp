@extends('layouts.app') @section('content')

<div class="tab-content">
    <!--dashboard tab-->
    <div class="container body" id="dashboard">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <div class="grid">
                            <div class="box box1">
                                <div class="icon">
                                    <div class="add-teacher-Icon"><span><i class="fa fa-user-plus"></i></span></div>
                                </div>
                                <div class="revenue">
                                    <h3>3,492</h3>
                                    <p>Total teachers</p>
                                </div>
                            </div>
                            <div class="box box2">
                                <div class="icon">
                                    <div class="register-Icon"><span><i class="fa fa-bell-o"></i></span></div>
                                </div>
                                <div class="revenue">
                                    <h3>492</h3>
                                    <p>Today registered</p>
                                </div>
                            </div>
                            <div class="box box3">
                                <div class="icon">
                                    <div class="conversion-Icon"><span> <i class="fa fa-cog"></i> </span></div>
                                </div>
                                <div class="revenue">
                                    <h3>3.68%</h3>
                                    <p>Conversion Rate</p>
                                </div>
                            </div>
                            <div class="box box4">
                                <div class="icon">
                                    <div class="visit-Icon"><span><i class="fa fa-eye"></i></span></div>
                                </div>
                                <div class="revenue">
                                    <h3>64,500</h3>
                                    <p>Today's Visits</p>
                                </div>
                            </div>
                            <div class="box box5">
                                <div class="quickLink-header">Quick Links</div>
                                <div class="quick-icon">Icon I</div>
                                <div class="quick-icon">Icon II</div>
                                <div class="quick-icon">Icon III</div>
                                <div class="quick-icon">Icon IV</div>
                                <div class="quick-icon">Icon V</div>
                                <div class="quick-icon">Icon VI</div>
                            </div>
                            <div class="box box6">
                                Graph goes here
                            </div>
                            <div class="box box7">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis, velit expedita vitae delectus error magnam, accusamus quibusdam dolorem harum dolore ut! Itaque ad laudantium ea, numquam accusantium similique sint sed ipsum velit eveniet aliquam est
                                labore temporibus officia rem corrupti perferendis cum aliquid nostrum debitis voluptatem culpa reprehenderit voluptatibus. Asperiores!
                            </div>
                            <div class="box box8">
                                News Feed goes here
                            </div>
                        </div>
                    </div>
                    <div class="info-body">
                        <div>
                            <div class="" id="data"></div>
                            <button id="btnSubForm" onclick="plusForm(1);" style="display:none;">next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="tab-pane" id="settings">Contenido settings</div>
</div>
@endsection