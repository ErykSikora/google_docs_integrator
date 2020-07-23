<?php

    require __DIR__ . '/vendor/autoload.php';

    echo ';test';

    // $client = new \Google_Client();
    // $client->setApplicationName('Excel z danymi');
    // $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
    // $client->setAccessType('offline');
    // $client->setAuthConfig(_DIR_ . '/credentials.json');
    // $service = new Google_Service_Sheet($client);

    // $spreadsheetId = "1XE1QZR0MNK-RIh8Unn3ite4IVJB0nb10gPQGs0jKayc";

    // $range = "Sheet1!A2:J14";
    // $response = $service->spreadsheets_values->get($spreadsheetId, $range);
    // $values = $response->getValues();
    // if empty($values){
    //     print "No data found";
    // } else {
    //     $mask = "%10s %-10s %s\n";
    //     foreach ($values as $row) {
    //         echo sprintf($mask, $row[2], $row[1], $row[0]);
    //     }
    // }

?>