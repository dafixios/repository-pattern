<?php

namespace App\Enums;


enum CustomerSource: string
{
    case App = 'app';
    case Api = 'api';
}
