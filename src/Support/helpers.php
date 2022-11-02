<?php

use Support\Flash\Flash;

 if(!function_exists('flash')){
     function flash():Support\Flash\Flash
     {
        return app(Flash::class);
     }
 }