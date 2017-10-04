<?php

include_once('../model/bd_connect.php');

if (!isset($_GET['section']) OR $_GET['section'] == 'index')
{
    include_once('../controler/blog/comment/comments_index_Controler.php');
}
