<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class NotFoundException extends Exception{
    public function __construct( $message = "", int $code = 0, ?Throwable $previous = null){
        parent::__construct($message,$code,$previous);
    }
    public function error404(){
        require VIEWS . 'errors/error.php';
    }
    public function error500(){
        require VIEWS . 'errors/error.php';
    }
}