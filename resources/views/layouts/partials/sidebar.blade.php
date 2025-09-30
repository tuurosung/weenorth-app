<!-- BEGIN #sidebar -->
<div id="sidebar" class="app-sidebar bg-white">
    <!-- BEGIN scrollbar -->
    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">
        <!-- BEGIN menu -->
        <div class="menu pt-4">
            <div class="menu-item active">
                <a href="index.html" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-laptop"></i></span>
                    <span class="menu-text">Dashboard</span>
                </a>
            </div>
            <x-sidebar.single-menu-item menuIcon="code-branch" menuText="Regions" menuLink="{{ route('region.index') }}"/>
            <x-sidebar.single-menu-item menuIcon="model-cube" menuText="Districts" menuLink="{{ route('district.index') }}"/>
            <x-sidebar.single-menu-item menuIcon="warehouse-alt" menuText="Service Centers" menuLink="{{ route('service-center.index') }}"/>

            <div class="menu-divider"></div>
            <div class="menu-header">Wee-Network</div>

            <x-sidebar.menu-item-has-sub menuIcon="users-alt" menuText="Membership" :menuItems="config('menu.membership')" />

            <x-sidebar.menu-item-has-sub menuIcon="tools" menuText="Trades"  :menuItems="config('menu.trades')" />
            <x-sidebar.menu-item-has-sub menuIcon="network-analytic" menuText="Network"  :menuItems="config('menu.network')" />

            <div class="menu-divider"></div>
            <div class="menu-header">Wee-Tools</div>

            <x-sidebar.single-menu-item menuIcon="comment-alt" menuText="Chat"/>
            <x-sidebar.single-menu-item menuIcon="calendar" menuText="Events"/>
            <x-sidebar.single-menu-item menuIcon="book-open-cover" menuText="Resources" />
            <x-sidebar.single-menu-item menuIcon="hammer-brush" menuText="Service Requests" menuLink="{{ route('service-requests.index') }}" />
            <x-sidebar.single-menu-item menuIcon="hammer-brush" menuText="District Ranking" menuLink="" />
            <x-sidebar.single-menu-item menuIcon="resume" menuText="Resume Builder" menuLink="{{ route('resume-builder.my-resume') }}" />


            <div class="menu-divider"></div>
            <div class="menu-header">Settings</div>

            <x-sidebar.single-menu-item menuIcon="users" menuText="Users" menuLink="{{ route('users.index') }}" />
            <x-sidebar.single-menu-item menuIcon="settings" menuText="Configuration" />


            <div class="p-3 px-4 mt-auto hide-on-minified">
                <a href="#"
                    class="btn btn-warning d-block w-100 fw-600 rounded-pill text-purple">
                    <i class="fi fi-br-interrogation"></i> Help
                </a>
            </div>
        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->

    <!-- BEGIN mobile-sidebar-backdrop -->
    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
    <!-- END mobile-sidebar-backdrop -->
</div>
<!-- END #sidebar -->
