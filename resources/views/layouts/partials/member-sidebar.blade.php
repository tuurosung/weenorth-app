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


            <div class="menu-divider"></div>
            <div class="menu-header">Wee-Tools</div>

            <x-sidebar.single-menu-item menuIcon="comment-alt" menuText="Chat" />
            <x-sidebar.single-menu-item menuIcon="calendar" menuText="Events" />
            <x-sidebar.single-menu-item menuIcon="book-open-cover" menuText="Resources" />
            <x-sidebar.single-menu-item menuIcon="hammer-brush" menuText="Service Requests"
                menuLink="{{ route('service-requests.index') }}" />
            <x-sidebar.single-menu-item menuIcon="resume" menuText="Resume Builder"
                menuLink="{{ route('resume-builder.my-resume') }}" />


        </div>
        <!-- END menu -->
    </div>
    <!-- END scrollbar -->

    <!-- BEGIN mobile-sidebar-backdrop -->
    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
    <!-- END mobile-sidebar-backdrop -->
</div>
<!-- END #sidebar -->
