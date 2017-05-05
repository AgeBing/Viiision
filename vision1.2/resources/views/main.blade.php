<!DOCTYPE html>
<html>

@include('partical.head')

<body bgcolor=#e5e5e5>
    @yield('echarts')
    <!--顶部导航-->
    <header class="spots-header">
        <!--右侧部分 ：Search bar，Link item，User Panel-->
        @include('partical.nav')
        <!--侧边按钮-->
        @include('partical.menubutton')
    </header>
    <!--spots 主体容器-->
    @yield('maincontent')
    <!--Import jQuery before materialize.js-->
    @yield('script')
    
</body>
    @include('partical.script')
</html>