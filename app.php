<?php

//********************************************************************
// do not edit this section

if(!defined("APPSDIR"))
    die("Direct access is not allowed!");

//********************************************************************

$page->addStylesheet("css/style.css");
//$page->addScript("scripts/appname.js");

$html = file_get_contents("templates/main.html");

$page->addContent($html);