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
    <li class="@if ($activePage == 'dashboard') active @endif">
          <a href="{{ route('dashboard.index') }}">
            <i class="now-ui-icons users_single-02"></i>
            <p> {{ __("Dashboard") }} </p>
          </a>
        </li>

      <!-- Central Admin -->
      @if(auth()->user()->otherrole == 1 )
 
 
 

      <!-- Central Officer -->
      @elseif(auth()->user()->otherrole == 2 )

      <!-- Central Staff -->
      @elseif(auth()->user()->otherrole == 3 )

      <!-- Regional Officer -->
      @elseif(auth()->user()->otherrole == 4 )

      <!-- Regional Staff -->
      @elseif(auth()->user()->otherrole == 5 )

      <!-- Provincial Officer -->
      @elseif(auth()->user()->otherrole == 6 )

      <!-- Provincial Staff -->
      @elseif(auth()->user()->otherrole == 7 )
    

        <!-- Municipal Officer section -->
        @elseif(auth()->user()->otherrole == 8 )
       


       <!-- Municipal Staff section -->
      @elseif(auth()->user()->otherrole == 9 )
 
        @php 
          $activeLGUPages = ['VISION', 'NutritionPolicies', 'Governance', 'LNCManagement', 'nutritionservice', 'changeNS', 'discussionquestion', 'budgetAIP'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#MellpiPro">
            <p> {{ __("MELLPI Pro for LGU") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'MELLPI PRO For LGU Profile' || in_array($activePage, $activeLGUPages) ) show @endif" id="MellpiPro">
            <ul class="nav">
              <li class="@if ($activePage == 'LGUPROFILE') active @endif">
                <a href="{{ route('CMSLGUprofile.index') }}">

                  <p> <i class="now-ui-icons files_paper"></i>{{ __("LGU PROFILE") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'VISION') active @endif">
                <a href="{{ route('CMSvisionmission.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("vision mission") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'NutritionPolicies') active @endif">
                <a href="{{ route('CMSnutritionpolicies.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Nutrition policies") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'Governance') active @endif">
                <a href="{{ route('CMSgovernance.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Governance") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'LNCManagement') active @endif">
                <a href="{{ route('CMSlncmanagement.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("LNC Management") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'nutritionservice') active @endif">
                <a href="{{ route('CMSnutritionservice.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("nutrition service") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'changeNS') active @endif">
                <a href="{{ route('CMSchangeNS.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Change in NS") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'discussionquestion') active @endif">
                <a href="{{ route('CMSdiscussionquestion.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Discussion Question") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'budgetAIP') active @endif">
                <a href="{{ route('CMSbudgetAIP.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Budget (AIP)") }} </p>
                </a>
              </li>
            </ul>
          </div>
        </li>
  

        @php 
          $activeLNFPPages = ['mellpi_pro_form5', 'mellpi_pro_form6', 'mellpi_pro_form8', 'mellpi_pro_interview', 'mellpi_pro_overallScore'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#MellpiProLNFP">
            <p> {{ __("MELLPI Pro for LNFP") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'LGU Profile LNFP' || in_array($activePage, $activeLNFPPages) ) show @endif" " id="MellpiProLNFP">
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
            
              <li class="@if ($activePage == 'mellpi_pro_form8') active @endif">
                <a href="{{ route('lnfpForm8Index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("FORM 8") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'mellpi_pro_interview') active @endif">
                <a href="{{ route('lnfpFormInterviewIndex') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("INTERVIEW") }} </p>
                </a>
              </li>
              <!-- <li class="@if ($activePage == 'mellpi_pro_summary1b') active @endif">
                <a href="#">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("WRITTEN EXAM COMPUTATION") }} </p>
                </a>
              </li> -->
              <li class="@if ($activePage == 'mellpi_pro_overallScore') active @endif">
                <a href="{{ route('lnfpFormOverallScoreIndex') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("OVERALL SCORE") }} </p>
                </a>
              </li>
            </ul>
          </div>
        </li>

 
        <li>
          <a data-toggle="collapse" href="#resource">
            <p> {{ __("resources") }}
              <b class="caret"></b>
            </p>
          </a>
          
          <div class="collapse @if ($namePage == 'LGU Profile LNFP' || in_array($activePage, $activeLNFPPages) ) show @endif" " id="resource">
            <ul class="nav">
              <li style=" width: inheret;
                        word-wrap: break-word!important;
                        overflow-wrap: break-word!important;" >
                <a href="{{ route('CMSpersonnelDnaDirectory.index') }}"> 
                  <i class="now-ui-icons files_paper"></i>
                  <p > {{ __("Personnel DNA directory ") }} </p>
                </a>
              </li>
              <li>
                <a href="{{ route('CMSnutritionffices.indexA') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("nutrition offices") }} </p>
                </a>
              </li>
              <li>
              <a href="{{ route('CMSequipmentInventory.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("equipment inventory") }} </p>
                </a>
              </li>
        
            </ul>
          </div>
        </li>
 


      
      
        <!-- Barangay section -->
      @elseif(auth()->user()->otherrole == 10 )
        @php 
          $activeLGUPages = ['VISION', 'NutritionPolicies', 'Governance', 'LNCManagement', 'nutritionservice', 'changeNS', 'discussionquestion', 'budgetAIP'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#MellpiPro">
            <p> {{ __("MELLPI Pro for LGU") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'MELLPI PRO For LGU Profile' || in_array($activePage, $activeLGUPages) ) show @endif" id="MellpiPro">
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


        @php 
          $activeLNFPPages = ['mellpi_pro_form5', 'mellpi_pro_form6', 'mellpi_pro_form8', 'mellpi_pro_interview', 'mellpi_pro_overallScore'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#MellpiProLNFP">
            <p> {{ __("MELLPI Pro for LNFP") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'LGU Profile LNFP' || in_array($activePage, $activeLNFPPages) ) show @endif" " id="MellpiProLNFP">
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
            
              <li class="@if ($activePage == 'mellpi_pro_form8') active @endif">
                <a href="{{ route('lnfpForm8Index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("FORM 8") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'mellpi_pro_interview') active @endif">
                <a href="{{ route('lnfpFormInterviewIndex') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("INTERVIEW") }} </p>
                </a>
              </li>
   
              <li class="@if ($activePage == 'mellpi_pro_overallScore') active @endif">
                <a href="{{ route('lnfpFormOverallScoreIndex') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("OVERALL SCORE") }} </p>
                </a>
              </li>
            </ul>
          </div>
        </li>


        @php 
          $activeLNFPPages = ['mellpi_pro_form5', 'mellpi_pro_form6', 'mellpi_pro_form8', 'mellpi_pro_interview', 'mellpi_pro_overallScore'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#Resources">
            <p> {{ __("Resources") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'LGU Profile LNFP' || in_array($activePage, $activeLNFPPages) ) show @endif" " id="Resources">
            <ul class="nav">
              <li class="@if ($activePage == 'NutritionOffice') active @endif">
              <a href="{{ route('BSequipmentInventory.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Nutrition Offices") }} </p>
                </a>
              </li>
  
              <li class="@if ($activePage == 'EquipmentInventory') active @endif">
                <a href="{{ route('BSequipmentInventory.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Equipment Inventory") }} </p>
                </a>
              </li> 
         
              <li class="@if ($activePage == 'PersonnelDirectory') active @endif">
                <a href="{{ route('BSpersonnel.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Personnel DNA Directory ") }} </p>
                </a>
              </li> 
        

            </ul>
          </div>
        </li>
 
      @endif
    </ul>
  </div>
</div>