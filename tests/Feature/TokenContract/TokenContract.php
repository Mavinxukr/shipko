<?php


namespace Tests\Feature\TokenContract;


interface TokenContract
{
    public function getToken(array $user): string ;

}
