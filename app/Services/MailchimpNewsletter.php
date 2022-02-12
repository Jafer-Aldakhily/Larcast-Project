<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;


class MailchimpNewsletter implements Newsletter{

    public function __construct(protected ApiClient $client)
    {
        #
    }

    public function subscribe(string $email,$list = null)
    {   
        
        $list ??= config('services.mailchimp.subscribers.key');

        $response = $this->client->lists->addListMember($list, [
            "email_address" => $email,
            "status" => "subscribed",
        ]);
        
    }

}