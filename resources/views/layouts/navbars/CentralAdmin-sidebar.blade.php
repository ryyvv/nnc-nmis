<!--         
                @php 
          $activeLNFPPages = ['mellpi_pro_form5', 'mellpi_pro_form6', 'mellpi_pro_form8', 'mellpi_pro_interview', 'mellpi_pro_overallScore'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#Performance">
            <p> {{ __("LGU Performance") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'LGU Profile LNFP' || in_array($activePage, $activeLNFPPages) ) show @endif" " id="Performance">
            <ul class="nav">
              <li class="@if ($activePage == 'LGUPROFILELNFP') active @endif">
                <a href="{{ route('BSLGUprofileLNFPIndex.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("LGU Reports") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'mellpi_pro_form5') active @endif">
                <a href="{{ route('MellpiProMonitoringIndex.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("LNFP Reports") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'mellpi_pro_form6') active @endif">
                <a href="{{ route('MellpiProRadialIndex.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("LNC Functionality") }} </p>
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
        
      
        @php 
          $activeLNFPPages = ['mellpi_pro_form5', 'mellpi_pro_form6', 'mellpi_pro_form8', 'mellpi_pro_interview', 'mellpi_pro_overallScore'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#Form">
            <p> {{ __("Form Management") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'LGU Profile LNFP' || in_array($activePage, $activeLNFPPages) ) show @endif" " id="Form">
            <ul class="nav">
              <li class="@if ($activePage == 'LGUPROFILELNFP') active @endif">
                <a href="{{ route('BSLGUprofileLNFPIndex.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("MellPi Pro for LGU Profile") }} </p>
                </a>
              </li>
              <li class="@if ($activePage == 'mellpi_pro_form5') active @endif">
                <a href="#">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("MellPi Pro for LNFP") }} </p>
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
          $activeLGUPages = ['VISION', 'NutritionPolicies', 'Governance', 'LNCManagement', 'nutritionservice', 'changeNS', 'discussionquestion', 'budgetAIP'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#User">
            <p> {{ __("User Management ") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'MELLPI PRO For LGU Profile' || in_array($activePage, $activeLGUPages) ) show @endif" id="User">
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
          $activeLGUPages = ['VISION', 'NutritionPolicies', 'Governance', 'LNCManagement', 'nutritionservice', 'changeNS', 'discussionquestion', 'budgetAIP'];
        @endphp
        <li>
          <a data-toggle="collapse" href="#Bulk">
            <p> {{ __("Import/Bulk Data ") }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse @if ($namePage == 'MELLPI PRO For LGU Profile' || in_array($activePage, $activeLGUPages) ) show @endif" id="Bulk">
            <ul class="nav">
              <li class="@if ($activePage == 'NutritionPolicies') active @endif">
                <a href="{{ route('nutritionpolicies.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("Nutrition policies") }} </p>
                </a>
              </li>

              </li>
              <li class="@if ($activePage == 'changeNS') active @endif">
                <a href="{{ route('changeNS.index') }}">
                  <i class="now-ui-icons files_paper"></i>
                  <p> {{ __("PSGC Code") }} </p>
                </a>
              </li>
            </ul>
          </div>
        </li>
 -->
 
 

      <li>
        <a data-toggle="collapse" href="#UserManagement">
          <p> {{ __("User Management") }} <b class="caret"></b> </p>
        </a>
        <div class="collapse " id="UserManagement">
          <ul class="nav">
            <li class="@if ($activePage == 'profile') active @endif">
              <a href="">
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
        <div class="collapse " id="FormManagement">
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
      <li>
        <a data-toggle="collapse" href="#BulkManagement">
          <!-- <i class="now-ui-icons files_paper"></i> -->
          <p>
            {{ __("Bulk Management") }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse " id="BulkManagement">
          <ul class="nav">
            <li class="@if ($activePage == 'forms') active @endif">
              <a href="#">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("PSGS Region") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'forms') active @endif">
              <a href="#">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("PSGS Province") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'forms2') active @endif">
              <a href="#">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("PSGS Municipal") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'forms2') active @endif">
              <a href="#">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("PSGS City") }} </p>
              </a>
            </li>
            <li class="@if ($activePage == 'forms2') active @endif">
              <a href="#">
                <i class="now-ui-icons users_single-02"></i>
                <p> {{ __("PSGS Barangay") }} </p>
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