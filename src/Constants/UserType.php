<?php

namespace Eduzz\ActivityHistory\Constants;

final class UserType
{
    public const PRODUCER = 'PRODUCER';
    public const COPRODUCER = 'COPRODUCER';
    public const AFFILIATE = 'AFFILIATE';
    public const CUSTOMER = 'CUSTOMER';
    public const SUPPORT = 'SUPPORT';

    public static function validate(string $type)
    {
        switch($type) {
            case 'PRODUCER':
            case 'COPRODUCER':
            case 'AFFILIATE':
            case 'CUSTOMER':
            case 'SUPPORT':
                return true;
            default:
                return false;
        }
    }
}