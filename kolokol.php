<?php
$postfields = array(
    "live" => "1",
    "sport_id" => 5,
    "time_shift" => 0,
    "lang_id" => 0,
    "platforma" => "SITE_CUPIS",
    "session" => "488ffc169ade6438a169abd47dbd0ef5"
);
$header = array(
    'X-Token: d201f431e12545d09080ce02931df657',
    'Content-Type: application/json'
);
$url = 'https://olimp.bet/api/';
$ch = curl_init();
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_URL, $url.'slice');
curl_setopt($ch, CURLOPT_POST, 1 );
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postfields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = json_decode(curl_exec($ch))->data;
$match_mass = [];
foreach($data as $match){
    $info = $match->it[0];
    if(!isset($match_mass[$match->id])){
        $match_mass[$match->id] = ['c1'=> $info->c1, 'c2' => $info->c2, 'score' => $info->sc, 'score_more' => $info->scd ];
}
print_r($match_mass);

?>
