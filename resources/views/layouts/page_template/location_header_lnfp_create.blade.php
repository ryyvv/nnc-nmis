<!-- FOR BARANGAY ROLE -->
@if( auth()->user()->otherrole == 10 )
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

<!-- FOR CITY/MUNICIPALITY ROLE -->
@elseif( auth()->user()->otherrole == 9 )
<input type="hidden" name="formrequest" id="formrequest" />
<input type="hidden" name="barangay_id" value="{{ auth()->user()->barangay }}" />
<div style="display:flex">
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


<!-- FOR PROVINCIAL ROLE -->
@elseif( auth()->user()->otherrole == 7 )
<input type="hidden" name="formrequest" id="formrequest" />
<input type="hidden" name="barangay_id" value="{{ auth()->user()->barangay }}" />
<div style="display:flex">
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
@endif

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