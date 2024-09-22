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
               <!-- <li class="@if ($activePage == 'mellpi_pro_summary') active @endif">
                 <a href="{{ route('MellpiProLNFPSummary.index') }}">
                   <i class="now-ui-icons files_paper"></i>
                 <p> {{ __("LNFP SUMMARY") }} </p>
               </a>
              </li> -->
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