<?php

    require __DIR__ . '/vendor/autoload.php';                               // include mechanizmu [composer]

    # M A I N    C O N F I G

    $client = new \Google_Client();                                         // deklaracja klienta
    $client->setApplicationName('Excel z danymi');                          // tytuł aplikacji (informacja tylko na nasz użytek)
    $client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);             // definiujemy zakresy, które ma obsługiwać nasze naszędzie
    $client->setAccessType('offline');                                      // domyślnie, polecam tak zostawić
    $client->setDeveloperKey("**");    // klucz API
    $client->setAuthConfig(__DIR__ . '/credentials.json');                  // credentials.json generowany z Google API (musi dostarczyć klient - właściciel konta google)

    $service = new Google_Service_Sheets($client);                          // deklaracja połączenia

    $spreadsheetId = "**";        // id naszego pliku (do wydobycia z linka dokumentu)

    $range = "Sheet1!A15:B15";                                               // zakres odczytywanych plików 
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
        ["Snow John", "umarl@przezyl.com"],
        ["Bravo Johnny", "XD@yahoo.com"],
        ["Mendes Eva", "em@test.com"]
    ];

    $body = new Google_Service_Sheets_ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];

    $result = $service->spreadsheets_values->update(
        $spreadsheetId,
        $range,
        $body,
        $params
    );

?>