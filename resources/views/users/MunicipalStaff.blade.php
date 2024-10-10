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


            <div class="content">

                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')

                <div class="row-12">
                    <table class="display table" id="lnfpReport" width="100%">
                        <thead style="background-color:#508D4E;">
                            <tr>

                                <th scope="col" class="tableheader">Name of Officer</th>
                                <th scope="col" class="tableheader">Evaluatee</th>
                                <th scope="col" class="tableheader">Date Created</th>
                                <th scope="col" class="tableheader">Date Updated</th>
                                <th scope="col" class="tableheader">Form Status</th>
                                <th>&nbsp;</th>
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
    <!-- Charts -->
    <div class="card">
        <div style="display:flex;align-items:center">
            <h4 style="margin-top:18px;font-weight:bold">Charts</h4>
        </div>

        <div class="row">

            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">LNC Checklist</h5>
                        <h4 class="card-title">LNC Functionality</h4>
                        <div class="dropdown">
                            <button type="button"
                                class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
                                data-toggle="dropdown">
                                <i class="now-ui-icons ui-1_calendar-60"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item">2020</button>
                                <button type="button" class="dropdown-item">2021</button>
                                <button type="button" class="dropdown-item">2022</button>
                                <button type="button" class="dropdown-item">2023</button>
                                <button type="button" class="dropdown-item">2024</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <canvas id="lnc-functionality-chart"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category">LNC Checklist</h5>
                        <h4 class="card-title">LNC Functionality, per geographical level</h4>
                        <div class="dropdown" style="margin-right: 48px;">
                            <button type="button"
                                class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
                                data-toggle="dropdown">
                                <i class="now-ui-icons ui-1_calendar-60"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item">2020</button>
                                <button type="button" class="dropdown-item">2021</button>
                                <button type="button" class="dropdown-item">2022</button>
                                <button type="button" class="dropdown-item">2023</button>
                                <button type="button" class="dropdown-item">2024</button>
                            </div>
                        </div>
                        <div class="dropdown">
                            <button type="button"
                                class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret"
                                data-toggle="dropdown">
                                <i class="now-ui-icons location_pin"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right"
                                style="height: auto; max-height: 223.14px; overflow-x: hidden;">
                                <button type="button" class="dropdown-item">National Capital Region (NCR)</button>
                                <button type="button" class="dropdown-item">Cordillera Administrative Region
                                    (CAR)</button>
                                <button type="button" class="dropdown-item">Region I (Ilocos Region)</button>
                                <button type="button" class="dropdown-item">Region II (Cagayan Valley)</button>
                                <button type="button" class="dropdown-item">Region III (Central Luzon)</button>
                                <button type="button" class="dropdown-item">Region IV-A (CALABARZON)</button>
                                <button type="button" class="dropdown-item">MIMAROPA Region</button>
                                <button type="button" class="dropdown-item">Region V (Bicol Region)</button>
                                <button type="button" class="dropdown-item">Region VI (Western Visayas)</button>
                                <button type="button" class="dropdown-item">Negros Island Region (NIR)</button>
                                <button type="button" class="dropdown-item">Region VII (Central Visayas)</button>
                                <button type="button" class="dropdown-item">Region VIII (Eastern Visayas)</button>
                                <button type="button" class="dropdown-item">Region IX (Zamboanga Peninsula)</button>
                                <button type="button" class="dropdown-item">Region X (Northern Mindanao)</button>
                                <button type="button" class="dropdown-item">Region XI (Davao Region)</button>
                                <button type="button" class="dropdown-item">Region XII (SOCCSKSARGEN)</button>
                                <button type="button" class="dropdown-item">Region XIII (Caraga)</button>
                                <button type="button" class="dropdown-item">Bangsamoro Autonomous Region In Muslim
                                    Mindanao (BARMM)</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <canvas id="lnc-functionality-geographic-chart"></canvas>
                        </div>
                    </div>
                    <div class="card-footer">
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="{{ asset('assets/js/custom-charts/municipal-staff.js') }}"></script>
@endpush