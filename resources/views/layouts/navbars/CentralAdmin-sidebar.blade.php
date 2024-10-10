


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
            <li class="@if ($activePage == 'form5a') active @endif">
                <a href="{{ route('form5.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p> {{ __("Form 5 PNAO ") }} </p>
                </a>
            </li>

            <li class="@if ($activePage == 'form5b') active @endif">
                <a href="{{ route('form5.index') }}">
                    <i class="now-ui-icons users_single-02"></i>
                    <p> {{ __("Form 5 CMNAO ") }} </p>
                </a>
            </li>
            
            <li class="@if ($activePage == 'forms2') active @endif">
                <a href="">
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
            <li class="@if ($activePage == 'forms2') active @endif">
                <a href="#">
                    <i class="now-ui-icons users_single-02"></i>
                    <p> {{ __("Equipment Inventory") }} </p>
                </a>
            </li>
            <li class="@if ($activePage == 'forms2') active @endif">
                <a href="#">
                    <i class="now-ui-icons users_single-02"></i>
                    <p> {{ __("LNC Checklist") }} </p>
                </a>
            </li>
            <li class="@if ($activePage == 'forms2') active @endif">
                <a href="#">
                    <i class="now-ui-icons users_single-02"></i>
                    <p> {{ __("Personnel Directory") }} </p>
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

<!-- Remove Later LNC Functionality -->
<li class="@if ($activePage == 'lncFunctionality') active @endif">
    <a href="{{ route('lncFunctionality.index') }}">
        <i class="now-ui-icons users_single-02"></i>
        <p> {{ __("LNC Functionality") }} </p>
    </a>
</li>