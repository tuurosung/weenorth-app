<?php

namespace App\Services;

class MessagingService
{

    const COUNTRY_CODE = '233';
    const CLIENT_ID = 'piuupqod';
    const CLIENT_SECRET = 'zojmgjbl';
    const FROM = 'WEENorthApp';

    public $receipient;
    public $message;


    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }



    public function setRecipient($phone)
    {
        $this->receipient = $phone;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }


    public function sendMessage()
    {
        // validate the phone number
        $this->validatePhoneNumber();
        return $this->makeRequest();
    }


    private function makeRequest()
    {
        if (!$this->message) {
            throw new \InvalidArgumentException('Message is required');
        }

        $curl = curl_init();

        // check if curl is available
        if (!$curl) {
            throw new \Exception('cURL is not available');
        }

        $query = [
            "clientid" => self::CLIENT_ID,
            "clientsecret" => self::CLIENT_SECRET,
            "from" => self::FROM,
            "to" => $this->receipient,
            "content" => $this->message
        ];

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://smsc.hubtel.com/v1/messages/send?" . http_build_query($query),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET"
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
            throw new \Exception('cURL Error #: ' . $error);
        }

        return $response;
    }



    /**
     * Validate phone number
     *
     * @throws \InvalidArgumentException
     * @return void
     */
    public function validatePhoneNumber(): void
    {
        // check if empty, if not exactly 10 digits and if starts with 0
        if (empty($this->receipient) || strlen($this->receipient) != 10 || substr($this->receipient, 0, 1) != '0') {
            throw new \InvalidArgumentException('Invalid phone number');
        }

        $allowedPrefixes = ["024", "054", "055", "059", "053", "020", "050", "027", "057", "023", "026", "056", "028"];

        if (!in_array(substr($this->receipient, 0, 3), $allowedPrefixes, true)) {
            throw new \InvalidArgumentException('Invalid phone number');
        }

        $this->receipient = $this->formatPhoneNumber();
    }


    /**
     * Format phone number
     *
     * @return array|string|null
     */
    private function formatPhoneNumber()
    {
        return preg_replace('/^0/', self::COUNTRY_CODE, $this->receipient);
    }
}
