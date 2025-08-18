<?php

namespace App\Controllers\Base;
class WebController implements IBase
{
    function redirect($to){
        header("Location: $to");
        die();
    }
}