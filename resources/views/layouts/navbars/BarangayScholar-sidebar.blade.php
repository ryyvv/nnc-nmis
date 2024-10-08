<!-- @php 
          $activeLGUPages = ['VISION','B1bSummary','B2bSummary','B4Summary', 'NutritionPolicies', 'Governance', 'LNCManagement', 'nutritionservice', 'changeNS', 'discussionquestion', 'budgetAIP'];
        @endphp
  


        @php 
          $activeLNFPPages = ['mellpi_pro_summary', 'mellpi_pro_form5', 'mellpi_pro_form6', 'mellpi_pro_form8', 'mellpi_pro_interview', 'mellpi_pro_overallScore'];
        @endphp -->
        


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