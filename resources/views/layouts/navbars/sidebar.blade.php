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
    <a href="#" class="simple-text logo-normal">
      {{ __('NMIS') }}
    </a>
  </div>
  <div class="sidebar-wrapper" id="sidebar-wrapper">
    <ul class="nav">

      <!-- Central Admin -->
      @if(auth()->user()->role == 1 )
      <li class="@if ($activePage == 'dashboard') active @endif">
        <a href="{{ route('CAdashboard.index') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p> {{ __("Dashboard") }} </p>
        </a>
      </li>

      <!-- for LGUs -->
      <li class="@if ($activePage == 'lgu') active @endif">
        <a data-toggle="collapse" href="#LGU">
          <p>
            {{ __('MellPi Pro FOR LGUs') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="LGU">
          <ul class="nav">
            <li class="@if ($activePage == 'PersonnelDnaDirectoryIndex') active @endif">
              <a href="{{ route('personnelDnaDirectoryIndex') }}">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Personnel DNA Directory") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'NutritionOfficesIndex') active @endif">
              <a href="{{ route('nutritionOfficesIndex') }}">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Nutrition Offices") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'EquipmentInventoryIndex') active @endif">
              <a href="{{ route('equipmentInventoryIndex') }}">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Equipment Inventory") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>


      <!-- for LNFPs -->
      <li class="@if ($activePage == 'notifications') active @endif">
        <a data-toggle="collapse" href="#LNFP">
          <p>
            {{ __('MellPi Pro FOR LNFP') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="LNFP">
          <ul class="nav">
            <li class="@if ($activePage == '') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Empty") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == '') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Empty") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == '') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Empty") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <!-- for Resources -->
      <li class="@if ($activePage == 'resources') active @endif">
        <a data-toggle="collapse" href="#Resources">
          <p>
            {{ __('Resources') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="Resources">
          <ul class="nav">
            <li class="@if ($activePage == '') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Empty") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == '') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Empty") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == '') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Empty") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

      <li>
        <a data-toggle="collapse" href="#UserManagement">
          <p> {{ __("User Management") }} <b class="caret"></b> </p>
        </a>
        <div class="collapse show" id="UserManagement">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="{{ route('CAprofile.index') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("User Profile") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Users') active @endif">
              <a href="{{ route('CAadmin.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("List of Users") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Roles') active @endif">
              <a href="{{ route('roles.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("List of Roles") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Permissions') active @endif">
              <a href="{{ route('permission.index') }}">
                <i class="now-ui-icons design_bullet-list-67"></i>
                <p> {{ __("List of Permission") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'mellpi_pro_LGU') active @endif">
              <a href="{{ route('mellpi_pro_LGU.index') }}">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("PSGC Data -Bulk Upload") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li>
        <a data-toggle="collapse" href="#FormManagement">
          <!-- <i class="now-ui-icons files_paper"></i> -->
          <p>
            {{ __("Form Management") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="FormManagement">
          <ul class="nav">
            <li class="@if ($activePage == 'forms') active @endif">
              <a href="{{ route('forms.index') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Forms1") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'forms2') active @endif">
              <a href="{{ route('formsb.index') }}">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("Forms2") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="@if ($activePage == 'bsuserprofile') active @endif">
        <a href="#">
          <i class="now-ui-icons users_single-02"></i>
          <p> {{ __("User Profile") }} </p>
        </a>
      </li>

      <!-- Central Officer -->
      @elseif(auth()->user()->role == 2 )
      <!-- Central Staff -->
      @elseif(auth()->user()->role == 3 )
      <!-- Regional Officer -->
      @elseif(auth()->user()->role == 4 )
      <!-- Regional Staff -->
      @elseif(auth()->user()->role == 5 )
      <!-- Provincial Officer -->
      @elseif(auth()->user()->role == 6 )
      <!-- Provincial Staff -->
      @elseif(auth()->user()->role == 7 )

      <!-- Municipal Officer section -->
      @elseif(auth()->user()->role == 8 )
      <li class="@if ($activePage == 'dashboard') active @endif">
        <a href="#">
          <i class="now-ui-icons users_single-02"></i>
          <p> {{ __("Dashboard") }} </p>
        </a>
      </li>
      <li>
        <a data-toggle="collapse" href="#MellpiPro">
          <p> {{ __("MELLPI Pro for LGU") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="MellpiPro">
          <ul class="nav">
            <li class="@if ($activePage == 'LGUPROFILE') active @endif">
              <a href="#">

                <p> <i class="now-ui-icons files_paper"></i>{{ __("LGU PROFILE") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'VISION') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("vision mission") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'NutritionPolicies') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Nutrition policies") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Governance') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Governance") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'LNCManagement') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("LNC Management") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'nutritionservice') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("nutrition service") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'changeNS') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Change in NS") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'discussionquestion') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Discussion Question") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'budgetAIP') active @endif">
              <a href="#  ">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Budget (AIP)") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>

       <!-- Municipal Staff section -->
      @elseif(auth()->user()->role == 9 )
     <li class="@if ($activePage == 'dashboard') active @endif">
        <a href="#">
          <i class="now-ui-icons users_single-02"></i>
          <p> {{ __("Dashboard") }} </p>
        </a>
      </li>

      <li>
        <a data-toggle="collapse" href="#MellpiPro">
          <p> {{ __("MELLPI Pro for LGU") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="MellpiPro">
          <ul class="nav">
            <li class="@if ($activePage == 'LGUPROFILE') active @endif">
              <a href="#">

                <p> <i class="now-ui-icons files_paper"></i>{{ __("LGU PROFILE") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'VISION') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("vision mission") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'NutritionPolicies') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Nutrition policies") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'Governance') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Governance") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'LNCManagement') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("LNC Management") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'nutritionservice') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("nutrition service") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'changeNS') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Change in NS") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'discussionquestion') active @endif">
              <a href="#">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Discussion Question") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'budgetAIP') active @endif">
              <a href="#  ">
                <i class="now-ui-icons files_paper"></i>
                <p> {{ __("Budget (AIP)") }} </p>
              </a>
            </li>
          </ul>
        </div>
      </li>


      <!-- Barangay section -->
      @elseif(auth()->user()->role == 10 )
      <li class="@if ($activePage == 'dashboard') active @endif">
        <a href="{{ route('BSdashboard.index') }}">
          <i class="now-ui-icons users_single-02"></i>
          <p> {{ __("Dashboard") }} </p>
        </a>
      </li>

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

                <p> <i class="now-ui-icons files_paper"></i>{{ __("LGU PROFILE") }} </p>
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
                <p> {{ __("FORM 6 and 7") }} </p>
              </a>
            </li>
            <!-- <li class="@if ($activePage == 'mellpi_pro_summary1b') active @endif">
                <a href="#">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("FORM 7") }} </p>
                </a>
              </li> -->
            <li class="@if ($activePage == 'mellpi_pro_form8') active @endif">
              <a href="{{ route('lnfpForm8Index') }}">
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
      @endif
    </ul>
  </div>
</div>