        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <!-- Styles -->
        <!-- Scripts -->
        <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
        </script>
        <script src="/js/app.js"></script>
        <!-- Scripts -->
        @yield('scripts')
    </body>
</html>
