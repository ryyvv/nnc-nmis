<!-- header -->
@if( $action == 'create' )
<input type="hidden" name="formrequest" id="formrequest" />
<div style="display:flex">
    <div class="form-group col">
        <label for="exampleFormControlInput1">Barangay:</label>
        <select name="barangay_id" class="form-control">
            @foreach($barangays as $barangay)
            <option value="{{ $barangay->psgc_code }}"
                {{ auth()->user()->barangay === $barangay->psgc_code ? 'selected' : '' }}>
                {{ $barangay->name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Municipality/City:</label>
        <select name="municipal_id2" class="form-control" style="font-weight:bolder!important;color:black" disabled>
            @foreach($cities_municipalities as $city_municipality)
            <option value="{{ $city_municipality->citymun_code }}"
                {{ auth()->user()->city_municipal === $city_municipality->citymun_code ? 'selected' : '' }}>
                {{ $city_municipality->name }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="municipal_id" value="{{ auth()->user()->city_municipal }}">
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Province:</label>

        <select name="province_id2" class="form-control" disabled style="font-weight:bolder!important;color:black">
            @foreach($provinces as $province)
            <option value="{{ $province->prov_code }}"
                {{ auth()->user()->Province === $province->prov_code ? 'selected' : '' }}>
                {{ $province->name }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="province_id" value="{{ auth()->user()->Province }}">
        <!-- <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}"> -->
        <input type="hidden" class="form-control" name="region_id" value="{{auth()->user()->Region}}">
        <input type="hidden" class="form-control" name="user_id" value="{{auth()->user()->id}}">

    </div>

</div>
<br>
<div style="display:flex">

    <div class="form-group col">
        <label for="dateMonitoring">Date of Monitoring:<span style="color:red">*</span></label>
        <input type="date" class="form-control" id="dateMonitoring" name="dateMonitoring"
            value="{{ old('dateMonitoring') }}" required>
        @error('dateMonitoring')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col">
        <label for="periodCovereda">Period Covered:<span style="color:red">*</span></label>
        <select class="form-control" id="periodCovereda" name="periodCovereda" required>
            <option value="">Select</option>
            <?php foreach ($years as $year) : ?>
            <option value="{{ $year }}" <?php echo old('periodCovereda') == $year ? 'selected' : '' ?>>
                {{ $year }}
            </option>
            <?php endforeach; ?>
        </select>
        @error('periodCovereda')
        <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>
</div>
<!-- endheader -->

@elseif( $action == 'edit')
<input type="hidden" name="formrequest" id="formrequest" />
<div style="display:flex">
    <div class="form-group col">
        <label for="exampleFormControlInput1">Barangay:</label>
        <select name="barangay_id" class="form-control">
            @foreach($barangays as $barangay)
            <option value="{{ $barangay->psgc_code }}"
                {{ auth()->user()->barangay === $barangay->psgc_code ? 'selected' : '' }}>
                {{ $barangay->name }}
            </option>
            @endforeach
        </select>
        <!-- <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}"> -->
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Municipality/City:</label>
        <select name="municipal_id2" class="form-control" disabled style="font-weight:bolder!important;color:black">
            @foreach($cities_municipalities as $city_municipality)
            <option value="{{ $city_municipality->citymun_code }}"
                {{ auth()->user()->city_municipal === $city_municipality->citymun_code ? 'selected' : '' }}>
                {{ $city_municipality->name }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="municipal_id" value="{{ auth()->user()->city_municipal }}">
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Province:</label>

        <select name="province_id2" class="form-control" disabled style="font-weight:bolder!important;color:black">
            @foreach($provinces as $province)
            <option value="{{ $province->prov_code }}"
                {{ auth()->user()->Province === $province->prov_code ? 'selected' : '' }}>
                {{ $province->name }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="province_id" value="{{ auth()->user()->Province }}">
        <!-- <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}"> -->
        <input type="hidden" class="form-control" name="region_id" value="{{$row->region_id}}">
        <!-- <input type="hidden" class="form-control" name="user_id" value="{{$row->id}}">  -->

    </div>

</div>
<br>

<div style="display:flex">

    <div class="form-group col">
        <label for="dateMonitoring">Date of Monitoring:<span style="color:red">*</span></label>
        <input type="date" class="form-control" id="dateMonitoring" name="dateMonitoring"
            value="{{$row->dateMonitoring}}">
        @error('dateMonitoring')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col">
        <label for="periodCovereda">Period Covered:<span style="color:red">*</span></label>
        <select class="form-control" id="periodCovereda" name="periodCovereda">
            <option value="">Select</option>
            <?php foreach ($years as $year) : ?>
            <option value="{{ $year }}" <?php echo $row->periodCovereda == $year ? 'selected' : '' ?>>
                {{ $year }}
            </option>
            <?php endforeach; ?>
        </select>
        @error('periodCovereda')
        <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>
</div>


@elseif( $action == 'show')
<input type="hidden" name="formrequest" id="formrequest" />
<div style="display:flex">
    <div class="form-group col">
        <label for="exampleFormControlInput1">Barangay:</label>
        <select name="barangay_id" class="form-control bold"  style="color:black" disabled>
            @foreach($barangays as $barangay)
            <option value="{{ $barangay->psgc_code }}"
                {{ auth()->user()->barangay === $barangay->psgc_code ? 'selected' : '' }}>
                {{ $barangay->name }}
            </option>
            @endforeach
        </select>
        <!-- <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}"> -->
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Municipality/City:</label>
        <select name="municipal_id2" class="form-control bold" disabled style="font-weight:bolder!important;color:black">
            @foreach($cities_municipalities as $city_municipality)
            <option value="{{ $city_municipality->citymun_code }}"
                {{ auth()->user()->city_municipal === $city_municipality->citymun_code ? 'selected' : '' }}>
                {{ $city_municipality->name }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="municipal_id" value="{{ auth()->user()->city_municipal }}">
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Province:</label>

        <select name="province_id2" class="form-control bold" disabled style="font-weight:bolder!important;color:black">
            @foreach($provinces as $province)
            <option value="{{ $province->prov_code }}"
                {{ auth()->user()->Province === $province->prov_code ? 'selected' : '' }}>
                {{ $province->name }}
            </option>
            @endforeach
        </select>
        <input type="hidden" name="province_id" value="{{ auth()->user()->Province }}">
        <!-- <input type="text" class="form-control" name="province_id" value="{{auth()->user()->Province}}"> -->
        <input type="hidden" class="form-control" name="region_id" value="{{$row->region_id}}">
        <!-- <input type="hidden" class="form-control" name="user_id" value="{{$row->id}}">  -->

    </div>

</div>
<br>

<div style="display:flex">

    <div class="form-group col">
        <label for="dateMonitoring">Date of Monitoring:<span style="color:red">*</span></label>
        <input type="date" class="form-control bold" style="color:black" id="dateMonitoring" name="dateMonitoring"
            value="{{$row->dateMonitoring}}" disabled>
        @error('dateMonitoring')
        <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group col">
        <label for="periodCovereda">Period Covered:<span style="color:red">*</span></label>
        <select class="form-control bold" style="color:black" id="periodCovereda" name="periodCovereda" disabled>
            <option value="">Select</option>
            <?php foreach ($years as $year) : ?>
            <option value="{{ $year }}" <?php echo $row->periodCovereda == $year ? 'selected' : '' ?>>
                {{ $year }}
            </option>
            <?php endforeach; ?>
        </select>
        @error('periodCovereda')
        <div class="text-danger">{{ $message }}</div>
        @enderror

    </div>
</div>
<!-- endheader -->
@endif