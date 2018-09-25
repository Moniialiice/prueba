<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">

        <?php
        //Valida session de usuario
        if($this->session->flashdata('correcto'))?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    <style type="text/css">
    ::selection { background-color: #f07746; color: #fff; }
    ::-moz-selection { background-color: #f07746; color: #fff; }

    body {
    background-color: #fff;
    margin: 40px auto;
    max-width: 1024px;
    font: 16px/24px normal "Helvetica Neue", Helvetica, Arial, sans-serif;
    color: #808080;
    }

    a {
    color: #dd4814;
    background-color: transparent;
    font-weight: normal;
    text-decoration: none;
    }

    a:hover {
    color: #97310e;
    }

    h1 {
    color: #fff;
    background-color: #dd4814;
    border-bottom: 1px solid #d0d0d0;
    font-size: 22px;
    font-weight: bold;
    margin: 0 0 14px 0;
    padding: 5px 15px;
    line-height: 40px;
    }

    h2 {
    color:#404040;
    margin:0;
    padding:0 0 10px 0;
    }

    code {
    font-family: Consolas, Monaco, Courier New, Courier, monospace;
    font-size: 13px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    color: #002166;
    display: block;
    margin: 14px 0 14px 0;
    padding: 12px 10px 12px 10px;
    }

    #container {
    margin: 10px;
    border: 1px solid #d0d0d0;
    box-shadow: 0 0 8px #d0d0d0;
    border-radius: 4px;
    }

    p {
    margin: 0 0 10px;
    padding:0;
    }

    #body {
    margin: 0 15px 0 15px;
    min-height: 96px;
    }
    </style>
            <?php
        if($this->session->flashdata('correcto'))?>
</head>
<body>

    <!--basix-container -->
    <div id="container">
    <!-- Right Panel -->
    <!--div id="right-panel" class="righ-panel">

        <!-- Header-->
        <!--header id="header" class="header">
                <div class="col-sm-7">
                    <h2>Control de Gestión de Oficios</h2>
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

        </header--><!-- /header -->

