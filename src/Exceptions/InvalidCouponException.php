<?php

namespace MichaelRubel\Couponables\Exceptions;

class InvalidCouponException extends \Exception
{
    /**
     * @var string
     */
    protected $message = 'Invalid coupon was passed.';

    /**
     * @var int
     */
    protected $code = 404;
}
