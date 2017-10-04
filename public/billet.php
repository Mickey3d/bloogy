<?php

include_once('../model/bd_connect.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('../controler/blog/billet/billet_show_Controler.php');
}
