<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use PHPUnit\Exception;

trait SendGridTrait
{

    public function createOrUpdateSubscriber($user): bool
    {
        try {
            $endpoint = "marketing/contacts";
            $url = "https://api.sendgrid.com/v3/$endpoint";
            $api_key = config('app.sendgrid_api_key');
            $post_array['headers'] = [
                'Authorization' => 'Bearer ' . $api_key,
                'Content-Type' => "application/json"
            ];

            $nameSplit = explode(' ',ucwords( $user->name) ?? null);
            $contacts[] = [
                "email" =>  $user->email,
                "first_name" => ( $nameSplit[0] ?? "") ,
                "last_name" => ($nameSplit[1]  ?? "" ).(($nameSplit[2] ?? '') ? ' ' :'').($nameSplit[2]  ?? "")
            ];
            $post_data_array['contacts'] =$contacts;

            $post_array['body'] = \GuzzleHttp\json_encode($post_data_array);

            $client = new \GuzzleHttp\Client();
            $client->request("PUT", $url, $post_array);
            return true;
        } catch (\Exception $exception) {
            return false;
        }
    }

}
