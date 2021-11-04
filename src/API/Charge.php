<?php

namespace StarfolkSoftware\Flutterwave\API;

use StarfolkSoftware\Flutterwave\Abstracts\ApiAbstract;
use StarfolkSoftware\Flutterwave\Concerns\CanPerformTokenizedCharges;

final class Charge extends ApiAbstract
{
    use CanPerformTokenizedCharges;
}
