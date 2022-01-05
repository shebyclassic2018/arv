

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <meta name="description"
        content="OneUI - Bootstrap 4 Admin Template &amp; UI Framework created by pixelcave and published on Themeforest">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">




    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and OneUI framework -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <link rel="stylesheet" id="css-main" href="assets/css/oneui.min.css">
    <link rel="stylesheet" id="css-main" href="css/default/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" id="css-main" href="css/default.min.css">
    <link rel="stylesheet" id="css-main" href="css/default/select2.min.css">
    <link rel="stylesheet" id="css-main" href="css/file.css">
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/modern.min.css"> -->

    <link rel="stylesheet" href="assets/js/plugins/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/js/plugins/simplemde/simplemde.min.css">
    <style>
        #display{
            padding: 15px;
        }
        .hbar {
            position: absolute;
            height:5px;
            width: 60px;
            background: #ddd;
            /* animation: scan 3s ease-in-out infinite; */
            border-radius: 5px;
            bottom: 0;
        }
        .pos-rel {
            position: relative;
        }


        @keyframes scan {
            0%,100% {
                top: 0%;
            }
            50% {
                top: 100%;
            }
        }

        @keyframes stopScan {
            0% {
                bottom: 0;
            }
            100% {
                bottom: 0;
            }
        }
    </style>

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/amethyst.min.css"> -->
    <!-- END Stylesheets -->
    <?php
    session_start(); 
    
    if(@$_SESSION['role'] == 'administrator') {
        require_once 'pages/admin-home.php';
    } else {
        require_once 'pages/clinician-home.php';
    }
?>