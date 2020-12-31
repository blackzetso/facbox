<?php 
    session_start();
    include 'connect.php';

    ini_set('display_errors','on');

    $App = 'inc/App/';
    $lang = 'inc/lang/';
    
    /* 
    include function file
    */
    //include $App  . 'function.php';  
    //include $lang . 'en.php';
    /* 
    ========================================== 
    include head and nave 
    ========================================== 
    */ 
    include $App . 'function.php';
    include $App . 'head.php';
    include $App . 'top-nav.php';
    include $App . 'nav.php';
    //include $App . 'querys.php';