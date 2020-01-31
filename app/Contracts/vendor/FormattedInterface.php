<?php


namespace App\Contracts\vendor;


interface FormattedInterface
{
    public function response(string $message,  int $statusCode , bool $statusBool, $data = null);
}
