<style>
/*label color start*/
.sidebar .nav p {
    color: #000;
}

.sidebar .nav p:hover {
    color: #64987e;
}

.sidebar .nav .active p:hover {
    color: #fff;
}

/* .sidebar .nav p:hover{
    color: #64987e;
  } */
/*end */
/*icon color start */
/* .sidebar .nav i {
    color: #000;
  } */
/*end */
/*logo color start */
.sidebar .logo-normal {
    color: #000 !important;
    font-weight: bolder;
}


.sidebar .logo-normal:hover {
    color: #64987e !important;
}

/*end*/
</style>

<div class="sidebar" data-color="white">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="blue | green | darkgreen | orange | red | yellow"
-->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
            <img src="{{ asset('assets') }}/img/logo.png">
        </a> 
        <a href="#" class="simple-text logo-normal" style="font-size: 20px">
            {{ __('NNC') }}
        </a>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper" >
        <ul class="nav">
            <li class="@if ($activePage == 'dashboard') active @endif">
                <a href="{{ route('BSdashboard.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p> {{ __("Dashboard") }} </p>
                </a>
            </li>

            <!-- dropdown -->
            <li>
                <a data-toggle="collapse" href="#MellpiPro">
                    <p> {{ __("MELLPI Pro for LGU") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="MellpiPro">
                    <ul class="nav">
                        <li class="@if ($activePage == 'LGUPROFILE') active @endif">
                            <a href="{{ route('BSLGUprofile.index') }}">
                               
                                <p>  <i class="now-ui-icons files_paper"></i>{{ __("LGU PROFILE") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'VISION') active @endif">
                            <a href="{{ route('visionmission.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("vision mission") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'NutritionPolicies') active @endif">
                            <a href="{{ route('nutritionpolicies.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("Nutrition policies") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'Governance') active @endif">
                            <a href="{{ route('governance.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("Governance") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'LNCManagement') active @endif">
                            <a href="{{ route('lncmanagement.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("LNC Management") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'nutritionservice') active @endif">
                            <a href="{{ route('nutritionservice.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("nutrition service") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'changeNS') active @endif">
                            <a href="{{ route('changeNS.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("Change in NS") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'discussionquestion') active @endif">
                            <a href="{{ route('discussionquestion.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("Discussion Question") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'budgetAIP') active @endif">
                            <a href="{{ route('budgetAIP.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("Budget (AIP)") }} </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li>
                <a data-toggle="collapse" href="#MellpiProLNFP">
                    <p> {{ __("MELLPI Pro for LNFP") }}
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse show" id="MellpiProLNFP">
                    <ul class="nav">
                        <li class="@if ($activePage == 'LGUPROFILELNFP') active @endif">
                            <a href="{{ route('BSLGUprofileLNFPIndex.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("LGU PROFILE (LNFP)") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'mellpi_pro_form5') active @endif">
                            <a href="{{ route('MellpiProMonitoringIndex.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("FORM 5") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'mellpi_pro_form6') active @endif">
                            <a href="{{ route('MellpiProRadialIndex.index') }}">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("FORM 6") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'mellpi_pro_summary1b') active @endif">
                            <a href="#">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("FORM 7") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'mellpi_pro_summary1b') active @endif">
                            <a href="#">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("FORM 8") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'mellpi_pro_summary1b') active @endif">
                            <a href="#">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("INTERVIEW") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'mellpi_pro_summary1b') active @endif">
                            <a href="#">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("WRITTEN EXAM COMPUTATION") }} </p>
                            </a>
                        </li>
                        <li class="@if ($activePage == 'mellpi_pro_summary1b') active @endif">
                            <a href="#">
                                <i class="now-ui-icons files_paper"></i>
                                <p> {{ __("OVERALL SCORE") }} </p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="@if ($activePage == 'dashboards') active @endif">
                <a href="{{ route('BSprofile.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p> {{ __("User Profile") }} </p>
                </a>
            </li>
        </ul>
    </div>
    </li>
 
</div>