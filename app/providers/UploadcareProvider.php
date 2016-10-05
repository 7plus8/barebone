<?php

namespace BA\Providers;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class UploadcareProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['uploadcare'] = function ($app)
        {
            return new \Uploadcare\Api('877f457bdc0390738219', '44a0b58ee2c4b4b0b76a');
        };
    }

    public function boot(Application $app)
    {
        //
    }
}
