<?php

    require __DIR__ . '/vendor/autoload.php';                               // include mechanizmu [composer]

    $client_id = '885860143890-r4n1fkdreo63g2732p478iubo3u9bgtf.apps.googleusercontent.com';
    $Email_address = 'przemek.galek@mindlab.pl';     
    $key_file_location = '1XE1QZR0MNK-RIh8Unn3ite4IVJB0nb10gPQGs0jKayc';      

    # M A I N    C O N F I G

    $client = new \Google_Client();                                         // deklaracja klienta
    $client->setApplicationName('Excel z danymi');                          // tytuł aplikacji (informacja tylko na nasz użytek)
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);             // definiujemy zakresy, które ma obsługiwać nasze naszędzie
    // $client->setScopes('https://www.googleapis.com/auth/spreadsheets');             // definiujemy zakresy, które ma obsługiwać nasze naszędzie
    $client->setAccessType('offline');                                      // domyślnie, polecam tak zostawić
    $client->setDeveloperKey("AIzaSyBQZUUXm0-K579mB7kX6MN1LfFcQPGPQKM");    // klucz API
    $client->setAuthConfig(__DIR__ . '/credentials.json');                  // credentials.json generowany z Google API (musi dostarczyć klient - właściciel konta google)
    // $client->setClientId('885860143890-r4n1fkdreo63g2732p478iubo3u9bgtf.apps.googleusercontent.com');
    // $client->setClientSecret('G9cAdXbM0M8W4q_ldco0DIST');
    $client->setApprovalPrompt('force');

    $service = new Google_Service_Sheets($client);                          // deklaracja połączenia

    // $google_oauth = new Google_Service_Oauth2($client);

    $spreadsheetId = "1XE1QZR0MNK-RIh8Unn3ite4IVJB0nb10gPQGs0jKayc";        // id naszego pliku (do wydobycia z linka dokumentu)

    $range = "Sheet1";                                               // zakres odczytywanych plików 

    # ODCZYT Z PLIKU

    // $response = $service->spreadsheets_values->get($spreadsheetId, $range); // żądanie pobrania informacji z Google
    // $values = $response->getValues();                                       // pobieramy odpowiedź

    // if (empty($values)){
    //     print "No data found";
    // } else {
    //     $mask = "%10s %-10s %s\n";
    //     foreach ($values as $row) {
    //         print_r($row);
    //     }
    // }

    $values = [
        ["Snow John", "umarl@przezyl.com"]
    ];

    $insert = [
        "insertDataOption" => "INSERT_ROWS"
    ];

    // ["Bravo Johnny", "XD@yahoo.com"],
    // ["Mendes Eva", "em@test.com"]

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];

    $update_sheet = $service->spreadsheets_values->update($spreadsheetId, $range, $body, $params);

    $result = $service->spreadsheets_values->append(
        $spreadsheetId,
        $range,
        $body,
        $params,
        $insert
    );

?>