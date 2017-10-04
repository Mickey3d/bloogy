<?php

include_once('../../model/bd_connect.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('../../controler/admin/blog/billet/billet_delete_Controler.php');
}
