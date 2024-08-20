<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets') }}/js/joboy.js"></script>
<script src="https://cdn.lordicon.com/lordicon.js"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Mellpi Pro Form 5 Monitoring',
'activePage' => 'mellpi_pro_form5',
'activeNav' => '',
])

@section('content')
<!-- <div class="panel-header panel-header-sm"></div> -->
<div class="content" style="margin-top:50px;padding:2%">
    <div class="row-12">
        <div class="col flex">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; align-items:center;">
                        <a href="{{route('MellpiProMonitoringIndex.index')}}" style="margin-right:15px"><i class="now-ui-icons arrows-1_minimal-left" style="font-size:18px!important;font-weight:bolder!important"></i></a>
                        <h4>CREATE MELLPI PRO FOR LNFP FORM 5</h4>
                    </div>

                    <br />

                    @if(session('alert'))
                    <div class="alert alert-success" id="alert-message">
                        {{ session('alert') }}
                    </div>
                    @endif
                    <div>
                        <form action="{{ route('lguLnfpUpdates') }}" method="POST">
                            @csrf

                            @foreach ($form5a as $form5a)
                            <!-- <input type="hidden" value="2" name="statForm"> -->
                            <!-- <center><img src="https://nnc-nmis.moodlearners.com/assets/img/logo.png" alt="" class="imgLogo"></center><br>
                            <center>
                                <h5 class="title">{{__("Mellpi Pro Form 5a: Provincial Nutrition Action Officer Monitoring")}}</h5>
                            </center><br> -->
                            @include('layouts.page_template.location_header')



                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="nameOf">Name of PNAO:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="text" name="nameOf" id="nameOf">
                                </div>
                                <div class="form-group col">
                                    <label for="address">Address:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="text" name="address" id="address">
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="numYr">Number of Years PNAO:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="number" name="numYr" id="numYr" placeholder="0" min="1" max="100">
                                </div>
                                <div class="form-group col">
                                    <label for="fulltime">Full time:<span style="color:red">*</span> </label>
                                    <select class="form-control" name="fulltime" id="fulltime">
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="profAct">With continuing professional Activities?:<span style="color:red">*</span> </label>
                                    <select class="form-control" name="profAct" id="profAct">
                                        <option value="">Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="bday">Birthday:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="date" name="bday" id="bday">
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="sex">Sex:<span style="color:red">*</span> </label>
                                    <select class="form-control" name="sex" id="sex">
                                        <option value="">Select</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col">
                                    <label for="dateDesig">Date of Designation:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="date" name="dateDesig" id="dateDesig">
                                </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label for="seconded">Seconded from the Office of:<span style="color:red">*</span> </label>
                                    <input class="form-control" type="text" name="seconded" id="seconded">
                                </div>
                                <div class="form-group col">&nbsp; </div>
                            </div>
                            <div style="display:flex">
                                <div class="form-group col">
                                    <label>Capacity development activities attended in the previous year:<span style="color:red">*</span> </label>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">1</label>
                                        <input class="form-control" type="text" id="devAct" name="num1">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">2</label>
                                        <input class="form-control" type="text" id="devAct" name="num2">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="devAct">3</label>
                                        <input class="form-control" type="text" id="devAct" name="num3">
                                    </div>
                                </div>
                                <div class="form-group col">&nbsp;</div>
                            </div>



                            <div class="form5">
                                <!-- endtablehearder -->
                                <div class="row" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">

                                    <div class="row table-responsive" style="display:flex;padding:10px;">
                                        <table class="table table-striped table-hover">
                                            <thead style="background-color:#508D4E;">
                                                <th class="text-center">&nbsp;</th>
                                                <th class="tableheader">Elements</th>
                                                <th colspan="5" class="tableheader">Performance Level</th>
                                                <th class="tableheader">Document Source</th>
                                                <th class="tableheader" style="padding-left:20px;padding-right:20px">Rating</th>
                                                <th class="tableheader">Remarks</th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td class="bold text-center">1</td>
                                                    <td class="bold text-center">2</td>
                                                    <td class="bold text-center">3</td>
                                                    <td class="bold text-center">4</td>
                                                    <td class="bold text-center">5</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td>A</td>
                                                    <td>{{$form5a->elementsA}}</td>
                                                    <td>{{$form5a->performanceA1}}</td>
                                                    <td>{{$form5a->performanceA2}}</td>
                                                    <td>{{$form5a->performanceA3}}</td>
                                                    <td>{{$form5a->performanceA4}}</td>
                                                    <td>{{$form5a->performanceA5}}</td>
                                                    <td>{{$form5a->documentSourceA}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingA">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksA" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>B</td>
                                                    <td>{{$form5a->elementsB}}</td>
                                                    <td>{{$form5a->performanceB1}}</td>
                                                    <td>{{$form5a->performanceB2}}</td>
                                                    <td>{{$form5a->performanceB3}}</td>
                                                    <td>{{$form5a->performanceB4}}</td>
                                                    <td>{{$form5a->performanceB5}}</td>
                                                    <td>{{$form5a->documentSourceB}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingB">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksB" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>{{$form5a->elementsBB}}</td>
                                                    <td>{{$form5a->performanceBB1}}</td>
                                                    <td>{{$form5a->performanceBB2}}</td>
                                                    <td>{{$form5a->performanceBB3}}</td>
                                                    <td>{{$form5a->performanceBB4}}</td>
                                                    <td>{{$form5a->performanceBB5}}</td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingBB">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksBB" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>C</td>
                                                    <td>{{$form5a->elementsC}}</td>
                                                    <td>{{$form5a->performanceC1}}</td>
                                                    <td>{{$form5a->performanceC2}}</td>
                                                    <td>{{$form5a->performanceC3}}</td>
                                                    <td>{{$form5a->performanceC4}}</td>
                                                    <td>{{$form5a->performanceC5}}</td>
                                                    <td>{{$form5a->documentSourceC}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingC">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksC" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>D</td>
                                                    <td>{{$form5a->elementsD}}</td>
                                                    <td>{{$form5a->performanceD1}}</td>
                                                    <td>{{$form5a->performanceD2}}</td>
                                                    <td>{{$form5a->performanceD3}}</td>
                                                    <td>{{$form5a->performanceD4}}</td>
                                                    <td>{{$form5a->performanceD5}}</td>
                                                    <td>{{$form5a->documentSourceD}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingD">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksD" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>E</td>
                                                    <td>{{$form5a->elementsE}}</td>
                                                    <td>{{$form5a->performanceE1}}</td>
                                                    <td>{{$form5a->performanceE2}}</td>
                                                    <td>{{$form5a->performanceE3}}</td>
                                                    <td>{{$form5a->performanceE4}}</td>
                                                    <td>{{$form5a->performanceE5}}</td>
                                                    <td>{{$form5a->documentSourceE}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingE">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksE" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>F</td>
                                                    <td>{{$form5a->elementsF}}</td>
                                                    <td>{{$form5a->performanceF1}}</td>
                                                    <td>{{$form5a->performanceF2}}</td>
                                                    <td>{{$form5a->performanceF3}}</td>
                                                    <td>{{$form5a->performanceF4}}</td>
                                                    <td>{{$form5a->performanceF5}}</td>
                                                    <td>{{$form5a->documentSourceF}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingF">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksF" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>G</td>
                                                    <td>{{$form5a->elementsG}}</td>
                                                    <td>{{$form5a->performanceG1}}</td>
                                                    <td>{{$form5a->performanceG2}}</td>
                                                    <td>{{$form5a->performanceG3}}</td>
                                                    <td>{{$form5a->performanceG4}}</td>
                                                    <td>{{$form5a->performanceG5}}</td>
                                                    <td>{{$form5a->documentSourceG}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingG">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksG" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>&nbsp;</td>
                                                    <td>{{$form5a->elementsGG}}</td>
                                                    <td>{{$form5a->performanceGG1}}</td>
                                                    <td>{{$form5a->performanceGG2}}</td>
                                                    <td>{{$form5a->performanceGG3}}</td>
                                                    <td>{{$form5a->performanceGG4}}</td>
                                                    <td>{{$form5a->performanceGG5}}</td>
                                                    <td>{{$form5a->documentSourceGG}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingGG">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksGG" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                                <tr>
                                                    <td>H</td>
                                                    <td>{{$form5a->elementsH}}</td>
                                                    <td>{{$form5a->performanceH1}}</td>
                                                    <td>{{$form5a->performanceH2}}</td>
                                                    <td>{{$form5a->performanceH3}}</td>
                                                    <td>{{$form5a->performanceH4}}</td>
                                                    <td>{{$form5a->performanceH5}}</td>
                                                    <td>{{$form5a->documentSourceH}}</td>
                                                    <td>
                                                        <select id="loadProvince1" class="form-control" name="ratingH">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </td>
                                                    <td><textarea name="remarksH" placeholder="Your remarks" class="form-control"></textarea></td>
                                                </tr>

                                            </tbody>
                                        </table>




                                    </div>


                                    @endforeach





                                    <div class="modal fade" id="exampleModalSubmit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                                                    <div>
                                                        <lord-icon
                                                            src="https://cdn.lordicon.com/yqiuuheo.json"
                                                            trigger="in"
                                                            colors="primary:#109121,secondary:#d1fad7"
                                                            style="width:150px;height:150px">
                                                        </lord-icon>
                                                    </div>
                                                    <div class="bold" style="font-size: 25px;color:#59987e">
                                                        Confirm Submission?
                                                    </div>
                                                    <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px">
                                                        Are you sure you want to save and submit this form? This process cannot be undone.
                                                    </div>
                                                    <div>
                                                        <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                        <button type="submit" id="lgu-draft" name="action" value="submit" class="bold btn btn-danger" style="background-color:#59987e!important">YES</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="modal fade" id="exampleModalDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog " role="document">
                                            <div class="modal-content">
                                                <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                                                    <div>
                                                        <lord-icon
                                                            src="https://cdn.lordicon.com/yqiuuheo.json"
                                                            trigger="hover"
                                                            colors="primary:#faf9d1,secondary:#ffbe55"
                                                            style="width:150px;height:150px">
                                                        </lord-icon>
                                                    </div>
                                                    <div class="bold" style="font-size: 25px;color:#e88c30">
                                                        Save as draft?
                                                    </div>
                                                    <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px">
                                                        Are you sure you want to save this as a draft?
                                                    </div>
                                                    <div>
                                                        <button type="button" style="margin-right:5px" class="bold btn btn-secondary" data-dismiss="modal">CANCEL</button>
                                                        <button type="submit" id="lgu-draft" class="bold btn btn-danger" name="action" value="draft" style="background-color:#ffbe55!important;color:white!important">YES</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        </form>
                    </div>
                    <div class="row" style="justify-content: flex-end;">
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalDraft">
                            Save as Draft
                        </button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalSubmit">
                            Save and Submit
                        </button>
                        <!-- <button type="submit" name="action" value="submit" class="btn btn-primary">Submit</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded and parsed');
        setTimeout(function() {
            var alertMessage = document.getElementById('alert-message');
            if (alertMessage) {
                console.log('Alert message found, hiding now');
                alertMessage.style.display = 'none';
            } else {
                console.log('Alert message not found');
            }
        }, 3000);
    });
</script>
<script src="{{ asset('assets/js/autoGenerateInput.js') }}"></script>
<!-- Modal Draft -->
<div class="modal fade" id="exampleModalCenterDraft" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Save as Draft?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="submit" id="lgu-draft" class="btn btn-primary">Yes</button>
            </div>
        </div>
    </div>
</div>
@endsection 