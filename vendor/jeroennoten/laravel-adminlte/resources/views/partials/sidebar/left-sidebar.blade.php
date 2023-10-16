<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}"
style="background:#d0497a;transition: 0.5s;overflow: hidden">
<style>
    :root {
--blue: #2a2185;
--white: #fff;
--gray: #f5f5f5;
--black1: #222;
--black2: #999;
} 
 .sidebar nav ul li {
border-top-left-radius: 30px;
border-bottom-left-radius: 30px;
}
.sidebar nav ul li:hover {
background-color: var(--white);
color: #d0497a !important;
}
.sidebar nav ul li a:hover {
color: #d0497a !important;
}
.sidebar nav ul li a {
color:white !important;
}
.sidebar nav ul li a.active{
border-top-left-radius: 30px !important;
border-bottom-left-radius: 30px !important;
background-color: var(--white) !important;
color: #d0497a !important;

}
</style>
    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')
            </ul>
        </nav>
    </div>

</aside>
