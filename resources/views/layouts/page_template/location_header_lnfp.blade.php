<!-- header -->
@if( $action == 'create')

@include('layouts.page_template.location_header_lnfp_create')

@elseif( $action == 'edit')

@include('layouts.page_template.location_header_lnfp_edit')

@endif