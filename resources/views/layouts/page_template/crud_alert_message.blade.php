@if(session('success'))
<div id="success-alert" style="background-color:#d1fad7!important;border: 2px solid #109121!important;border-radius:5px" class="alert alert-success alert-dismissible fade show" role="alert">
    <div class="d-flex" style="align-items:center!important">
        <lord-icon src="https://cdn.lordicon.com/guqkthkk.json" trigger="loop" delay="2000" colors="primary:#109121" style="width:25px;height:25px">
        </lord-icon>
        <label style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:8px" for="">Success! </label><span style="color:#109121;margin-bottom:0px!important;font-size:15px;margin-left:5px">{{ session('success') }}</span>
    </div>
    <button type="button" class="close" style="color:gray!important " data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<script>
    setTimeout(function() {
        $('#success-alert').fadeOut('slow');
    }, 5000);
</script>
@endif

<div id="deleteAlert">
</div>


<!-- error alert -->
@if(session('error'))
<div id="error-alert" style="background-color:#f4a09c!important;border: 2px solid #911710!important;border-radius:5px"  class="alert alert-danger alert-dismissible fade show" role="alert">
    <div class="d-flex" style="align-items:center!important">
        <lord-icon src="https://cdn.lordicon.com/akqsdstj.json" trigger="loop" delay="2000" style="width:30px;height:30px">
        </lord-icon>
        <label style="color:#92140c;margin-bottom:0px!important;font-size:15px;margin-left:8px" for="">Error! </label><span style="color:#92140c;margin-bottom:0px!important;font-size:15px;margin-left:5px"> {{ session('error') }}</span>
    </div>

    <button type="button" class="close" style="color:gray!important " data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<script>
    // Automatically close the alert after a few seconds
    setTimeout(function() {
        $('#error-alert').fadeOut('slow');
    }, 5000); // 5000 milliseconds = 5 seconds
</script>
@endif


@if(session('delete'))
<div id="success-alert" class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('delete') }}
    <lord-icon src="https://cdn.lordicon.com/hjbrplwk.json" trigger="in" colors="primary:#646e78,secondary:#ee6d66,tertiary:#e4e4e4,quaternary:#3a3347" style="width:250px;height:250px">
    </lord-icon>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- <script>
    // Auto close alert after 5 seconds
    setTimeout(function() {
        $('#success-alert').fadeOut('slow');
    }, 5000); // 5000 milliseconds = 5 seconds
</script> -->
@endif