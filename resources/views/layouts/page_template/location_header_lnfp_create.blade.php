<!-- FOR BARANGAY ROLE -->
@if( auth()->user()->otherrole == 10 )
<input type="hidden" name="formrequest" id="formrequest" />
<div style="display:flex">
    <div class="form-group col">
        <label for="exampleFormControlInput1">Barangay:</label>
        <select name="barangay_id" class="form-control">
            @foreach($brgy as $brgys)
            <option value="{{ $brgys->id }}" <?php echo auth()->user()->barangay == $brgys->id  ? "selected" : "" ?>>
                {{ $brgys->barangay }}</option>

            @endforeach
        </select>
        <!-- <input type="text" class="form-control" name="barangay_id" value="{{Auth()->user()->barangay}}"> -->
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Municipality/City:</label>
        <select name="municipal_id2" class="form-control" style="font-weight:bolder!important;color:black" disabled>
            @foreach($mun as $muns)
            <option value="{{ $muns->id }}"
                <?php echo auth()->user()->city_municipal == $muns->id  ? "selected" : "" ?>>{{ $muns->municipal }}
            </option>

            @endforeach
        </select>
        <input type="hidden" name="municipal_id" value="{{ auth()->user()->city_municipal }}">
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Province:</label>

        <select name="province_id2" class="form-control" disabled style="font-weight:bolder!important;color:black">
            @foreach($prov as $provs)
            <option value="{{ $provs->id }}" <?php echo auth()->user()->Province == $provs->id  ? "selected" : "" ?>>
                {{ $provs->province }}</option>
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
            @foreach($mun as $muns)
            <option value="{{ $muns->id }}"
                <?php echo auth()->user()->city_municipal == $muns->id  ? "selected" : "" ?>>{{ $muns->municipal }}
            </option>

            @endforeach
        </select>
        <input type="hidden" name="municipal_id" value="{{ auth()->user()->city_municipal }}">
    </div>
    <div class="form-group col">
        <label for="exampleFormControlInput1">Province:</label>

        <select name="province_id2" class="form-control" disabled style="font-weight:bolder!important;color:black">
            @foreach($prov as $provs)
            <option value="{{ $provs->id }}" <?php echo auth()->user()->Province == $provs->id  ? "selected" : "" ?>>
                {{ $provs->province }}</option>
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