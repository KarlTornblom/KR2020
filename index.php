<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html" charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Kvalprak Kundregister</title>
        <link rel="icon" href="/resources/kvalprak-ikon-192x192.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Libraries -->
        <link rel="stylesheet" href="/libraries/bootstrap-4.4.1-dist/bootstrap.min.css">
        <script src="libraries/jquery-3.4.1.js"></script>
        <script src="libraries/popper.min.js"></script>
        <script src="/libraries/bootstrap-4.4.1-dist/bootstrap.min.js"></script>
        <script src="/libraries/jquery-3.4.1.js"></script>
        <script src="libraries/datepicker/bootstrap-datepicker.min.js"></script>
        <script src="libraries/datepicker/bootstrap-datepicker.sv.min.js"></script>
        <link rel="stylesheet" href="libraries/datepicker/bootstrap-datepicker.min.css">
        <script src="https://kit.fontawesome.com/b359364edf.js" crossorigin="anonymous"></script>
        <script src="index.js" async defer></script>
        <link rel="stylesheet" href="index.css">

        <!-- CDNs -->
        <script src="index.js" async defer></script>
        <link rel="stylesheet" href="index.css">
    </head>
    <body onload="onload()">

        <div class="container-fluid">

            <!-- Logga -->
            <div class="row">
                <div class="col col-sm-1"></div>

                <div class="col col-sm-10">
                    <img class="kvalprak-kundregister-real" src="resources/kvalprak-kundregister-real.png" onclick="getData()">
                </div>

                <div class="col col-sm-1"></div>
            </div>

            <!-- Sök input -->
            <div class="row">
                <div class="col col-sm-5"></div>

                <div class="col col-sm-2">
                    <input autofocus autocomplete="off" placeholder="Sök" class="form-control" type="text" id="search">
                </div>
                <div class="col col-sm-1" id="user">
                    <i onclick="nyKund()" class="fas fa-user-plus fa-2x"></i>
                </div>

                <div class="col col-sm-5"></div>
            </div>

            <div class="row">
                <div class="col col-sm-1"></div>

                <div class="col col-sm-10" id="display">
                    <div id='data'>
                    </div>
                </div>

                <div class="col col-sm-1"></div>
            </div>
        </div>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    </body>
</html>