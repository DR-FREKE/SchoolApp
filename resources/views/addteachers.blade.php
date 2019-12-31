@extends('layouts.app')

@section('content')

    <!--add new teacher tab-->
    <div class="container body" id="add-teacher">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-default">
                    <div class="panel-heading">Add Teachers</div>

                    <div class="panel-body">
                        <div class="grid">
                            <div class="box addbox">
                                <div class="addbox-one">
                                    <section>
                                        Number of Teachers to be added: 
                                        <input id="selecter" type="number" value="1" style="width:10%;" min="1" />
                                    </section>
                                    <div class="info-body" id="form-body">
                                        <div class="" id="mData"></div>
                                        <button id="btnSubmitForm" onclick="plusForm(1);" disabled>next</button>
                                    </div>
                                </div>
                                <div class="addbox-two">
                                    <button id="btnSubmit" type="button">Create Forms</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection