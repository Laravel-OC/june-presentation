<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Learning Laravel</title>
        <meta name="description" content="learning Laravel on the internet">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- deck.js has a lot of dependencies -->
        <link rel="stylesheet" media="screen" href="css/dist.css">
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

        <script src="js/dist.js"></script>
    </body>
</html>
