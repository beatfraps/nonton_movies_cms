<?php

namespace App\Providers;

use Hypweb\Flysystem\GoogleDrive\GoogleDriveAdapter;
use Illuminate\Support\ServiceProvider;
use League\Flysystem\Filesystem;

class GoogleDriveServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        \Storage::extend("google", function($app, $config) {
            $client = new \Google_Client;
            $client->setClientId($config['clientId']);
            $client->setClientSecret($config['clientSecret']);
//            $client->refreshToken($config['refreshToken']);
            $client->setAccessToken('ya29.a0ARrdaM9jS0lrH-mm_6KjaLS-laSrUn4i-PDzPcJ1UHRgpCDmbMbf_XWvBvK0Z1R_EdI9int8P5HiqXnxiX0OxtQxyh_Z3bMEozsFLa2s6Lnr1pwdfrhSXrofI6Xw-P-t4lU3BMhhZlzsqhcWdxHxub450rP8');

            $service = new \Google_Service_Drive($client);
            $adapter = new GoogleDriveAdapter($service, $config['folderId']);
            return new Filesystem($adapter);
        });
    }
}
