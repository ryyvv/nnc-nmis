<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/joboy.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/diether.css') }}">
<script src="{{ asset('assets/js/joboy.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
.tab {
    text-align: center;
    font-size: 11px;
    border: 1px solid green;
}

.tab.active {
    border-top: 1px solid green;
}

table {
    width: 100%;
    table-layout: auto;
    /* Adjusts column width based on content */
    border-collapse: collapse;
}

tr>td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
    white-space: nowrap;
    /* Prevents text from wrapping to a new line */
}
</style>

@extends('layouts.app', [
'class' => 'sidebar-mini ',
'namePage' => 'Personnel Dna Directory',
'activePage' => 'PersonnelDnaDirectoryIndex',
'activeNav' => '',
])

@section('content')
<div class="content" style="margin-top:50px;padding:2%">
    <div class="card">
        <div class="row row-12" style="display:inline-block">
            <div class="card-header">
                <h5 class="title">{{__("Personnel Directory")}}</h5>
                <div>
                    <a class="btn btn-outline-primary" href="{{route('BSpersonnel.create')}}">Add Personnel
                        DNA Directory</a>
                </div>
            </div>
        </div>

        <!-- alerts -->
        @include('layouts.page_template.crud_alert_message')

        <form id="deleteForm" method="POST" style="display:none;">
            @csrf
            <input type="hidden" name="_method" id="methodField" value="DELETE">

            <input type="hidden" name="id" id="deleteId">
        </form>

        <div class="form-row" style="border-bottom: 1px solid #ddd;">
            <div id="tabs" class="d-flex mr-3">
                <div class="tab" data-tab="tab1">NAO</div>
                <div class="tab" data-tab="tab2">NPC</div>
                <div class="tab" data-tab="tab3">BNS</div>
            </div>
        </div>
        <div class="form-row">
            <div id="tab-contents" class="col-md-12">
                <div class="tab-content" id="tab1">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputNaoRegion">Region</label>
                            <select id="region-dropdown-Nao" class="form-control" name="inputNaoRegion">
                                <option value="">Select Region</option>
                            </select>
                            @error('inputNaoRegion')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNaoProvince">Province</label>
                            <select id="province-dropdown-Nao" disabled class="form-control" name="inputNaoProvince">
                                <option selected>Select Province</option>
                            </select>
                            @error('inputNaoProvince')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNaoCM">City/Municipality</label>
                            <select id="city-dropdown-Nao" disabled class="form-control" name="inputNaoCM">
                                <option selected>Select City/Municipality</option>
                            </select>
                            @error('inputNaoCM')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="overflow-x: scroll;">
                        <table id="nao-table" class="table table-striped table-bordered"
                            style="width: 100%; overflow-x: scroll;">
                            <thead>
                                <tr>
                                    <td><b>10-digit PSGC</b></td>
                                    <td><b>City/Municipality</b></td>
                                    <td><b>Name of Gov/Mayor</b></td>
                                    <td><b>Last Name</b></td>
                                    <td><b>First Name</b></td>
                                    <td><b>Middle Name</b></td>
                                    <td><b>Suffix</b></td>
                                    <td><b>Sex</b></td>

                                    <td><b>Cellphone Number</b></td>
                                    <td><b>Telephone Number</b></td>
                                    <td><b>Email Address</b></td>
                                    <td><b>Address</b></td>

                                    <td><b>Birthdate</b></td>
                                    <td><b>Age</b></td>
                                    <td><b>Educational Background</b></td>
                                    <td><b>Degree, course or year finished</b></td>

                                    <td><b>Type of NAO</b></td>
                                    <td><b>Type of Designation</b></td>
                                    <td><b>Date of Designation</b></td>
                                    <td><b>Type of Appointment</b></td>
                                    <td><b>Office Position</b></td>
                                    <td><b>Office / Department</b></td>
                                    <td><b>Action</b></td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-content" id="tab2">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputNpcRegion">Region</label>
                            <select id="region-dropdown-Npc" class="form-control" name="inputNpcRegion">
                                <option value="">Select Region</option>
                            </select>
                            @error('inputNpcRegion')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNpcProvince">Province</label>
                            <select id="province-dropdown-Npc" disabled class="form-control" name="inputNpcProvince">
                                <option selected>Select Province</option>
                            </select>
                            @error('inputNpcProvince')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputNpcCM">City/Municipality</label>
                            <select id="city-dropdown-Npc" disabled class="form-control" name="inputNpcCM">
                                <option selected>Select City/Municipality</option>
                            </select>
                            @error('inputNpcCM')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div style="overflow-x: scroll;">
                        <table id="npc-table" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td><b>10-digit PSGC</b></td>
                                    <td><b>City/Municipality</b></td>
                                    <td><b>Name of Gov/Mayor</b></td>
                                    <td><b>Last Name</b></td>
                                    <td><b>First Name</b></td>
                                    <td><b>Middle Name</b></td>
                                    <td><b>Suffix</b></td>
                                    <td><b>Sex</b></td>

                                    <td><b>Cellphone Number</b></td>
                                    <td><b>Telephone Number</b></td>
                                    <td><b>Email Address</b></td>
                                    <td><b>Address</b></td>

                                    <td><b>Birthdate</b></td>
                                    <td><b>Age</b></td>
                                    <td><b>Educational Background</b></td>
                                    <td><b>Degree, course or year finished</b></td>

                                    <td><b>Type of NPC</b></td>
                                    <td><b>Type of Designation</b></td>
                                    <td><b>Date of DEsignation</b></td>
                                    <td><b>Type of Appointment</b></td>
                                    <td><b>Office Position / Title</b></td>
                                    <td><b>Office / Department</b></td>
                                    <td><b>DCNPCAP Membership</b></td>
                                    <td><b>DCNPCAP-position (if officer)</b></td>
                                    <td><b>National or Regional (DCNPCAP officer)</b></td>
                                    <td><b>Action</b></td>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-content" id="tab3">
                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputBnsRegion">Region</label>
                            <select id="region-dropdown-Bns" class="form-control" name="inputBnsRegion">
                                <option value="">Select Region</option>
                            </select>
                            @error('inputBnsRegion')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputBnsProvince">Province</label>
                            <select id="province-dropdown-Bns" disabled class="form-control" name="inputBnsProvince">
                                <option selected>Select Province</option>
                            </select>
                            @error('inputBnsProvince')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputBnsCM">City/Municipality</label>
                            <select id="city-dropdown-Bns" disabled class="form-control" name="inputBnsCM">
                                <option selected>Select City/Municipality</option>
                            </select>
                            @error('inputBnsCM')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-group col-md-12">
                                <label for="inputBnsBarangay">Barangay</label>
                                <select id="barangay-dropdown-Bns" disabled class="form-control"
                                    name="inputBnsBarangay">
                                    <option selected>Select City/Municipality</option>
                                </select>
                                @error('inputBnsBarangay')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div style="overflow-x: scroll;">
                        <table id="bns-table" class="table table-striped table-bordered" style="width: 100%;">
                            <thead>
                                <tr>
                                    <td><b>10-digit PSGC</b></td>
                                    <td><b>Barangay</b></td>
                                    <td><b>ID No.</b></td>
                                    <td><b>Name on ID</b></td>

                                    <td><b>Last Name</b></td>
                                    <td><b>First Name</b></td>
                                    <td><b>Middle Name</b></td>
                                    <td><b>Suffix</b></td>
                                    <td><b>Sex</b></td>

                                    <td><b>Cellphone Number</b></td>
                                    <td><b>Telephone Number</b></td>
                                    <td><b>Email Address</b></td>
                                    <td><b>Address</b></td>

                                    <td><b>Birthdate</b></td>
                                    <td><b>Age</b></td>
                                    <td><b>Educational Background</b></td>
                                    <td><b>Degree, course or year finished</b></td>
                                    <td><b>Civil Status</b></td>

                                    <td><b>Status of Employment</b></td>
                                    <td><b>Beneficiary Name</b></td>
                                    <td><b>Relationship</b></td>
                                    <td><b>Period of action service from</b></td>
                                    <td><b>Period of action service to</b></td>
                                    <td><b>Last Update</b></td>
                                    <td><b>BNS Status</b></td>
                                    <td><b>Action</b></td>
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
</div>

@endsection
<!-- Alert Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="center modal-body" style="padding-bottom:50px; padding-left:50px;padding-right:50px;">
                <div>
                    <lord-icon src="https://cdn.lordicon.com/hjbrplwk.json" trigger="loop"
                        colors="primary:#646e78,secondary:#ee6d66,tertiary:#ebe6ef,quaternary:#3a3347"
                        style="width:150px;height:150px">
                    </lord-icon>
                </div>
                <div class="bold" style="font-size: 25px;color:gray">
                    Are you sure?
                </div>
                <div style="padding-top: 10px;padding-bottom: 20px; font-size:15px">
                    Do you really want to delete these record? This process cannot be undone.
                </div>
                <div>
                    <button type="button" style="margin-right:5px" class="bold btn btn-secondary"
                        data-dismiss="modal">CANCEL</button>
                    <button type="button" id='delete' class="bold btn btn-danger"
                        style="background-color:#ee6d66!important">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    const tabIdCache = [];

    function handleTableData(data, directoryType) {
        let tables = $(`#${directoryType}-table tbody`).empty();

        if (!data) return;

        $.each(data, function(index, item) {

            const directory = item[directoryType][0];
            const row = `<tr>
                            <td>${item.psgc_code}</td>
                            <td>${item.name}</td>
                            ${directoryType === 'bns' ? `<td>${item.id_number}</td>` : ''}
                            ${directoryType === 'bns' ? `<td>${item.name_on_id}</td>` : ''}
                            ${directoryType !== 'bns' ? `<td>${directory.namegovmayor || 'N/A'}</td>` : ''}
                            <td>${item.lastname}</td>
                            <td>${item.firstname}</td>
                            <td>${item.middlename}</td>
                            <td>${item.suffix}</td>
                            <td>${item.sex}</td>
                            <td>${item.cellphonenumer}</td>
                            <td>${item.telephonenumber}</td>
                            <td>${item.email}</td>
                            <td>${item.address}</td>
                            <td>${item.birthdate}</td>
                            <td>${item.age}</td>
                            <td>${item.educationalbackground}</td>
                            <td>${item.degreeCourse}</td>
                            ${directoryType === 'bns' ? `<td>${item.civilstatus}</td>` : ''}
                            ${directoryType === 'nao' ? `
                                <td>${directory.typenao}</td>
                                <td>${directory.typedesignation}</td>
                                <td>${directory.datedesignation}</td>
                                <td>${directory.typeappointment}</td>
                                <td>${directory.position}</td>
                                <td>${directory.department}</td>
                            ` : ''}
                            ${directoryType === 'npc' ? `
                                <td>${directory.typenpc}</td>
                                <td>${directory.typedesignation}</td>
                                <td>${directory.datedesignation}</td>
                                <td>${directory.typeappointment}</td>
                                <td>${directory.position}</td>
                                <td>${directory.department}</td>
                                <td>${directory.dcnpcapmembership}</td>
                                <td>${directory.dcnpcapposition}</td>
                                <td>${directory.dcnpcapofficer}</td>
                            ` : ''}
                            ${directoryType === 'bns' ? `
                                <td>${directory.statusemployment}</td>
                                <td>${directory.beneficiaryname}</td>
                                <td>${directory.relationship}</td>
                                <td>${directory.periodactivefrom}</td>
                                <td>${directory.periodactiveto}</td>
                                <td>${directory.lastupdate}</td>
                                <td>${directory.bnsstatus}</td>
                            ` : ''}
                            <td>
                                <i class="fa fa-eye fa-lg cursor show-icon" style="color:#4bb5ff;margin-right:10px"  data-toggle="tooltip" data-placement="top" title="View" data-id="${item.id}"></i>
                                <i class="fa fa-edit fa-lg cursor edit-icon" style="color:#FFB236;margin-right:10px" data-toggle="tooltip" data-placement="top" title="Edit" data-id="${item.id}"></i>
                                <i class="fa fa-trash fa-lg cursor delete-icon" style="color:red;margin-right:10px" data-toggle="tooltip" data-placement="top" title="Delete" data-id="${item.id}"></i>
                            </td>
                        </tr>`;


            tables.append(row);
        });

        tables.on('click', '.delete-icon', function() {
            const id = $(this).data('id');

            $('#deleteForm').attr('action', "{{ route('BSpersonnel.delete') }}");
            $('#methodField').val('DELETE');
            $('#deleteId').val(id);
            $('#deleteModal').modal('show');
        });

        $('#delete').on('click', function() {
            $('#deleteForm').submit();
        });

        tables.on('click', '.edit-icon', function() {
            const id = $(this).data('id');
            const url = `{{ route("BSpersonnel.edit", ":id") }}`.replace(':id', id)
            window.location = url;
        });

        tables.on('click', '.show-icon', function() {
            const id = $(this).data('id');
            const url = `{{ route("BSpersonnel.show", ":id") }}`.replace(':id', id)
            window.location = url;
        });
    }

    function getLocationData(tabId) {

        if (tabIdCache.includes(tabId)) return;
        tabIdCache.push(tabId);

        const oldValueMap = {
            tab1: {
                region: '{{ old("inputNaoRegion", $regCode) }}',
                province: '{{ old("inputNaoProvince") }}',
                city: '{{ old("inputNaoCM") }}'
            },
            tab2: {
                region: '{{ old("inputNpcRegion", $regCode) }}',
                province: '{{ old("inputNpcProvince") }}',
                city: '{{ old("inputNpcCM") }}'
            },
            tab3: {
                region: '{{ old("inputBnsRegion", $regCode) }}',
                province: '{{ old("inputBnsProvince") }}',
                city: '{{ old("inputBnsCM") }}',
                barangay: '{{ old("inputBnsBarangay") }}'
            }
        };

        const dropdownMap = {
            tab1: {
                region: $('#region-dropdown-Nao'),
                province: $('#province-dropdown-Nao'),
                city: $('#city-dropdown-Nao')
            },
            tab2: {
                region: $('#region-dropdown-Npc'),
                province: $('#province-dropdown-Npc'),
                city: $('#city-dropdown-Npc')
            },
            tab3: {
                region: $('#region-dropdown-Bns'),
                province: $('#province-dropdown-Bns'),
                city: $('#city-dropdown-Bns'),
                barangay: $('#barangay-dropdown-Bns')
            }
        };

        const birthdateMap = {
            tab1: $('#inputNaoBdate'),
            tab2: $('#inputNpcBdate'),
            tab3: $('#inputBnsBdate')
        };

        const ageMap = {
            tab1: $('#inputNaoAge'),
            tab2: $('#inputNpcAge'),
            tab3: $('#inputBnsAge')
        };

        const directoryTypeMap = {
            tab1: 'nao',
            tab2: 'npc',
            tab3: 'bns',
        };

        const oldValues = oldValueMap[tabId];
        const dropdowns = dropdownMap[tabId];
        const birthdateInput = birthdateMap[tabId];
        const ageInput = ageMap[tabId];
        const directoryType = directoryTypeMap[tabId];

        const routes = {
            getRegions: '{{ route("location.regions.get") }}',
            getProvinces: '{{ route("location.provinces.get") }}',
            getCitiesAndMunicipalities: '{{ route("location.citiesAndMunicipalities.get") }}',
            getBarangays: '{{ route("location.barangays.get") }}',
            getPersonelNao: '{{ route("BSpersonnel.get") }}'
        };

        const clearAndDisableDropdown = (dropdown, placeholder) => {
            dropdown.empty().append(
                    `<option value="" disabled selected>Select ${placeholder}</option>`)
                .prop('disabled', true);
        };

        const populateDropdown = (dropdown, data, valueKey, textKey, placeholder) => {
            dropdown.empty().append(
                `<option value="" disabled selected>Select ${placeholder}</option>`);
            data.forEach(item => {
                dropdown.append(
                    `<option value="${item[valueKey]}">${item[textKey]}</option>`);
            });
            dropdown.prop('disabled', false);
        };

        const fetchDataAndPopulate = (url, params, dropdown, valueKey, textKey, placeholder, oldValue =
            '') => {
            $.get(url, params)
                .done(function(data) {
                    if (!data || data.length === 0) {
                        clearAndDisableDropdown(dropdown, placeholder);
                        return;
                    }
                    populateDropdown(dropdown, data, valueKey, textKey, placeholder);

                    dropdown.val(oldValue).change();
                    if (dropdown.val() !== oldValue) {
                        dropdown.val('').change(); // Reset to default select
                    }
                })
                .fail(function() {
                    alert(`Failed to fetch ${placeholder.toLowerCase()}.`);
                });
        };

        $.get(routes.getRegions)
            .done(function(data) {
                clearAndDisableDropdown(dropdowns.province, 'Province');
                clearAndDisableDropdown(dropdowns.city, 'City/Municipality');
                populateDropdown(dropdowns.region, data, 'reg_code', 'name', 'Region');

                if (oldValues.region) {
                    dropdowns.region.val(oldValues.region).change();
                }
            })
            .fail(function() {
                alert('Failed to fetch regions.');
            });

        dropdowns.region.change(function() {
            const regionCode = $(this).val();
            const ncrRegionCode = '13';

            clearAndDisableDropdown(dropdowns.province, 'Province');

            if (!regionCode) return;

            if (regionCode === ncrRegionCode) {
                fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                    reg_code: regionCode
                }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);
                $.get(routes.getPersonelNao, {
                        directory_type: directoryType, //nao, npc, bns
                        reg_code: regionCode
                    }).done((data) => handleTableData(data, directoryType))
                    .fail(() => alert('Failed to fetch city details.'));
                return;
            }

            fetchDataAndPopulate(routes.getProvinces, {
                reg_code: regionCode
            }, dropdowns.province, 'prov_code', 'name', 'Province', oldValues.province);
            fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                reg_code: regionCode,
                excludeProvincialAreas: true
            }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);

            $.get(routes.getPersonelNao, {
                    directory_type: directoryType, //nao, npc, bns
                    reg_code: regionCode
                }).done((data) => handleTableData(data, directoryType))
                .fail(() => alert('Failed to fetch city details.'));
        });

        dropdowns.province.change(function() {
            const provinceCode = $(this).val();
            if (!provinceCode) return;

            fetchDataAndPopulate(routes.getCitiesAndMunicipalities, {
                prov_code: provinceCode
            }, dropdowns.city, 'citymun_code', 'name', 'City/Municipality', oldValues.city);

            $.get(routes.getPersonelNao, {
                    directory_type: directoryType, //nao, npc, bns
                    prov_code: provinceCode
                }).done((data) => handleTableData(data, directoryType))
                .fail(() => alert('Failed to fetch city details.'));
        });

        dropdowns.city.change(function() {
            const citymunCode = $(this).val();
            if (!citymunCode) return;

            fetchDataAndPopulate(routes.getBarangays, {
                citymun_code: citymunCode
            }, dropdowns.barangay, 'psgc_code', 'name', 'Barangay', oldValues.barangay);

            $.get(routes.getPersonelNao, {
                    directory_type: directoryType, //nao, npc, bns
                    citymun_code: citymunCode
                }).done((data) => handleTableData(data, directoryType))
                .fail(() => alert('Failed to fetch city details.'));
        });

        if (dropdowns.barangay) {
            dropdowns.barangay.change(function() {
                const psgcCode = $(this).val();
                if (!psgcCode) return;

                $.get(routes.getPersonelNao, {
                        directory_type: directoryType, //nao, npc, bns
                        psgc_code: psgcCode
                    }).done((data) => handleTableData(data, directoryType))
                    .fail(() => alert('Failed to fetch city details.'));
            });
        }
    }

    function setActiveTab(tabId) {
        getLocationData(tabId);
        $('.tab').removeClass('active');
        $('.tab-content').removeClass('active');

        $('[data-tab="' + tabId + '"]').addClass('active');
        $('#' + tabId).addClass('active');

    }

    setActiveTab('{{ session("activeTab", "tab1") }}');

    $('.tab').on('click', function() {
        const tabId = $(this).data('tab');
        setActiveTab(tabId);
    });

});
</script>