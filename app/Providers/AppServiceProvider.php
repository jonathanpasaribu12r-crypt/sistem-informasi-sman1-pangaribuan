<?php

namespace App\Providers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\Smtp\Stream\SocketStream;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Override mail transport untuk disable SSL verification
        Mail::extend('custom_smtp', function (array $config) {
            $transport = new EsmtpTransport(
                $config['host'],
                $config['port'],
                false
            );
            
            $transport->setUsername($config['username']);
            $transport->setPassword($config['password']);
            
            // Disable SSL verification
            $transport->getStream()->setStreamOptions([
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                ]
            ]);
            
            return $transport;
        });
    }
}