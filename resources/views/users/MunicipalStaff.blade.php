<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="content" style="padding:2%">
    <div class="card" style="border-radius:10px;padding-left:2rem!important;padding-right:1rem!important">
        <div class="card-header">
            <!-- <h5 class="title">{{__("List of Mellpi Pro for LGU Profile Sheet (Barangay)")}}</h5> -->

            <div style="display:flex;align-items:center">
                <!-- <a href="{{route('formsb.index')}}"> -->
                <h5 class="title">{{__("Mellpi Pro for LNFP Summary")}}</h5>
                <!-- </a> -->

            </div>

            <!-- alerts -->
            @include('layouts.page_template.crud_alert_message')


            <div class="content" >

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

                <div class="row-12">
                    <table class="display table" id="lnfpReport" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>
                                <th>&nbsp;</th>
                                <th scope="col" class="tableheader">Name of Officer</th>
                                <th scope="col" class="tableheader">Name of Evaluating</th>
                                <th scope="col" class="tableheader">Date Created</th>
                                <th scope="col" class="tableheader">Date Updated</th>
                                <th scope="col" class="tableheader">Form Status</th>
                                <!-- <th scope="col" class="tableheader">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
