<?php


class TelegramConnector
{
    public function __construct($token)
    {
        $this->token = $token;
        echo $token;
    }


    public function sendRequest($method, $type = "GET", $params = [])
    {

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.telegram.org/bot{$this->token}/$method",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_POSTFIELDS => json_encode($params),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        json_decode($response);

        return $response;
    }

    public function sendMessage($chatId, $message)
    {
        return $this->sendRequest("sendMessage", "POST", [
            "text" => $message,
            "chat_id" => $chatId
        ]);
    }
}
