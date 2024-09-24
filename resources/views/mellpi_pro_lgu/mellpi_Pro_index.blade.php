<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'mellpi_pro_LGU',
'activePage' => 'mellpi_pro_LGU',
'activeNav' => '',
])

@section('content')
<div class="panel-header panel-header-sm">
</div>
<div class="content">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("PSGC Data-Bulk Upload")}}</h5>
            </div>
            <div>
                @include('alerts.success')
                <!-- alerts -->
                @include('layouts.page_template.crud_alert_message')
                <form action="{{ route('mellpi_pro_LGU.Psgcupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfilePsgc" id="inputcsvfilePsgc"
                                accept=".csv" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload Psgc
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <form action="{{ route('mellpi_pro_LGU.Regionupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileRegion"
                                id="inputcsvfileRegion" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload Region
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <form action="{{ route('mellpi_pro_LGU.Provinceupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileProvince"
                                id="inputcsvfileProvince" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload Province
                                file</label>
                        </div>

                        <div class="input-group-append" sty413 Request Entity Too Large nginx/1.18.0
                            (Ubuntu)le="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
            </div>
            <div>
                <form action="{{ route('mellpi_pro_LGU.Cityupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileCity" id="inputcsvfileCity"
                                accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload City
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('mellpi_pro_LGU.Munupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileMun" id="inputcsvfileMun"
                                accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload Municipal
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('mellpi_pro_LGU.SubMunupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileSubMun"
                                id="inputcsvfileSubMun" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload Sub
                                Municipal
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('mellpi_pro_LGU.Barangayupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileBarangay"
                                id="inputcsvfileBarangay" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload Barangay
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('mellpi_pro_LGU.EquipmentInventoryupload') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileEquipmentInventory"
                                id="inputcsvfileEquipmentInventory" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload EQ
                                Inventory
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('mellpi_pro_LGU.PersonnelDirectoryupload') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfilePersonnelDirectory"
                                id="inputcsvfilePersonnelDirectory" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload Personnel
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
                <form action="{{ route('mellpi_pro_LGU.LncFunctionalityupload') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="inputcsvfileLncFunctionality"
                                id="inputcsvfileLncFunctionality" accept=".csv" required>
                            <label class="custom-file-label" aria-describedby="inputGroupFileAddon02">Upload LNC Func
                                file</label>
                        </div>

                        <div class="input-group-append" style="margin-left:5px">
                            <button class="btn btn-outline-primary" style="margin:0px; margin-left:0px" id="checkData"
                                type="submit">Check data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

@endsection