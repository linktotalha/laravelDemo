<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <!-- <base href="../"> -->
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Customer Relationship Management">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- Page Title  -->
    <title>CRM</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{mix('css/theme.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
    div.dataTables_wrapper div.dataTables_length select {
        margin: 10px;
        
    }
    .dataTables_filter {
        float: right;
    }
    div.dataTables_wrapper div.dataTables_filter input {
        width: 190px;
    }
</style>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            @include('layouts.sidebar')
            <!-- sidebar @e -->

            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('layouts.header')
                <!-- main header @e -->

                <!-- content @s -->
                {{-- @yield('content') --}}
                <!-- content @e -->

                <!-- footer @s -->
                @include('layouts.footer')
                <!-- footer @e -->

            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->

    <!-- JavaScript -->
    <script src="{{mix('js/theme.js')}}"></script>
    @stack('scripts')
</body>

</html>
