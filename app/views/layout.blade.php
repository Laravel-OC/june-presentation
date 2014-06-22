<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Learning Laravel</title>
        <meta name="description" content="learning Laravel on the internet">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- deck.js has a lot of dependencies -->
        <link rel="stylesheet" media="screen" href="css/vendor/deck.core.css">
        <link rel="stylesheet" media="screen" href="css/vendor/deck.status.css">
        <link rel="stylesheet" media="screen" href="css/vendor/swiss.css">
        <link rel="stylesheet" media="screen" href="css/vendor/vertical-slide.css">
        <link rel="stylesheet" media="print" href="css/vendor/print.css">

        <link rel="stylesheet" href="css/vendor/prism.css">
        <link rel="stylesheet" href="css/style.css">

        <!-- Required Modernizr file -->
        <script src="js/vendor/modernizr.custom.js"></script>
    </head>
    <body>

        <div class="deck-container">

            @yield("content")

            <p class="deck-status" aria-role="status">
                <span class="deck-status-current"></span>
                /
                <span class="deck-status-total"></span>
            </p>
        </div>

        <script src="js/vendor/jquery.min.js"></script>
        <script src="js/vendor/prism.js"></script>

        <script src="js/vendor/deck.core.js"></script>
        <script src="js/vendor/deck.status.js"></script>
        <!-- errything else -->
        <script src="js/app.js"></script>
    </body>
</html>
