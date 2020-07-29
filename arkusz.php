<?php

require __DIR__ . '/vendor/autoload.php';

$client = new \Google_Client();
$client->setApplicationName('Google Sheets and PHP');
$client->setScopes([\Google_Service_Sheets::SPREADSHEETS]);
$client->setAccessType('offline');
$client->setAuthConfig(__DIR__ . '/auth.json');
$service = new Google_Service_Sheets($client);

$spreadsheetId = '###';

$range = "Arkusz1";

$values = [
    ["Cześć", "mogę", "Cię", "zjeść?"]
];

$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);

$params = [
    'valueInputOption' => 'RAW'
];

$insert = [
    "insertDataOption" => "INSERT_ROWS"
];

$result = $service->spreadsheets_values->append(
    $spreadsheetId,
    $range,
    $body,
    $params,
    $insert
);

// $response = $service->spreadsheets_values->get($spreadsheetId, $range);
// $values = $response->getValues();

// if (empty($values)) {
//     print "No data found.\n";
// } else {
//     foreach ($values as $row) {
//         print_r($row);
//     }
// }

