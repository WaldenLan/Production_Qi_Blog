<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-24
 * Time: 下午10:16
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Qi's Blog</title>
    <link rel="shortcut icon" href="/logo/logo.png">
    <meta name="generator" content="Bootply" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Font-Awesome-3.2.1/css/font-awesome.min.css">
    <!--[if lt IE 9]>
    <script src="/html5shiv/html5shiv.js"></script>
    <![endif]-->
<!--    <link rel="stylesheet" href="/silviomoreto-bootstrap-select-a8ed49e/dist/css/bootstrap-select.css">-->

    <!-- include summernote css-->
    <link rel="stylesheet" href="/summernote-master/dist/summernote.css">
    <link rel="stylesheet" href="/style/linkstyle.css">
    <link rel="stylesheet" href="/style/bootstrap.custom.css">
    <link rel="stylesheet" href="/font-awesome-4.6.3/css/font-awesome.min.css">
</head>
<body>

<header class="navbar navbar-default navbar-fixed-top navbar-walden" role="banner">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="/">
                <img src="/logo/Qi's%20Blog-logo-2.png" alt="Qi's Blog Logo" width="155">
            </a>
        </div>
        <nav class="collapse navbar-collapse" role="navigation">
            <ul class="nav navbar-nav">
                <li class="nav-item <?php echo $nav_id == 0 ? '' : 'non-' ?>active">
                    <a href="/"><i class="icon-home"></i>&nbsp;Home</a>
                </li>
                <li class="nav-item <?php echo $nav_id == 1 ? '' : 'non-' ?>active">
                    <a href="/coding"><span class="glyphicon glyphicon-console"></span>&nbsp;Coding</a>
                </li>
                <li class="nav-item <?php echo $nav_id == 2 ? '' : 'non-' ?>active">
                    <a href="/geek"><i class="icon-laptop"></i>&nbsp;Geek</a>
                </li>
                <li class="nav-item <?php echo $nav_id == 3 ? '' : 'non-' ?>active">
                    <a href="/life"><i class="icon-user"></i>&nbsp;Life</a>
                </li>
                <li class="nav-item <?php echo $nav_id == 4 ? '' : 'non-' ?>active">
                    <a href="/about"><i class="icon-exclamation-sign"></i>&nbsp;About</a>
                </li>
                <li class="nav-item <?php echo $nav_id == 5 ? '' : 'non-' ?>active">
                    <a href="/message"><i class="fa fa-sticky-note"></i>&nbsp;Message</a>
                </li>
            </ul>
            <form class="form-inline pull-right nav-search" style="display: none">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default"><a href="#"><i class="glyphicon glyphicon-search"></i></a></button>
                    </span>
                </div>
            </form>
        </nav>
    </div>
</header>
<?php //echo $title; ?>

<div class="container">
    <div class="row">

