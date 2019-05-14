<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(!$update)
{
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

$responses = array();
$responses['fucile'] = array();
$responses['fucile'][] = 'maledetta tubercolosa infame!';
$responses['fucile'][] = 'diavola!';
$responses['fucile'][] = 'il fucile il fucile, sei andata dirgli del fucile!';
$responses['fucile'][] = 'Brutta serpe maledetta!';

$responses['madonna'] = array();
$responses['madonna'][] = 'maledetta tubercolosa infame!';
$responses['madonna'][] = 'Brutta serpe maledetta!';
$responses['madonna'][] = 'diavola!';

$responses['dio'] = array();
$responses['dio'][] = 'maledetto tubercoloso infame!';
$responses['dio'][] = 'Brutta bestia maledetta!';

$responses['soldi'] = array();
$responses['soldi'][] = 'Sono un poero contadino senza soldi nemmeno per allacciassi le scarpe';

$responses['colpa'] = array();
$responses['colpa'][] = 'Sono innocente come gesu sulla croce';
$responses['colpa'][] = 'gesù è mio fratello';

$responses['è stato'] = array();
$responses['è stato'][] = 'Sono innocente come gesu sulla croce';
$responses['è stato'][] = 'gesù è mio fratello';
$responses['è stato'][] = 'Io? Io quelle cose le faccio con la mi moglie, si piglia moglie apposta!';

$responses['mostro'] = array();
$responses['mostro'][] = 'Non sono io, prendiamolo insieme il mostro!';

$responses['pensi'] = array();
$responses['pensi'][] = 'Penso che andrò a farmi una scampagnata agli Scopeti.';

$responses['cattivo'] = array();
$responses['cattivo'][] = 'sono un poero agnelluccio!';

$responses['lavorare'] = array();
$responses['lavorare'][] = 'Ho sempre lavorato nei campi, non avevo nemmeno il tempo di allacciarmi le scarpe!';

$responses['lavoro'] = array();
$responses['lavoro'][] = 'Ho sempre lavorato nei campi, non avevo nemmeno il tempo di allacciarmi le scarpe!';

$responses['cattiva'] = array();
$responses['cattiva'][] = 'sono un poero agnelluccio!';

$responses['cattivo'] = array();
$responses['cattivo'][] = 'sono un poero agnelluccio!';

$responses['stronzo'] = array();
$responses['stronzo'][] = 'sono un poero agnelluccio!';

$responses['pietro'] = array();
$responses['pietro'][] = 'Dio dell’ostia maledetta!';
$responses['pietro'][] = 'Maledetta Diavola!';
$responses['pietro'][] = 'Brutta infame!';
$responses['pietro'][] = 'Brutta serpente!';
$responses['pietro'][] = 'Brutta maledetta puttanaccia!';
$responses['pietro'][] = 'Brutta tubercolosa velenosa!';
$responses['pietro'][] = 'Diavola! accidenti a quando ti vidi';
$responses['pietro'][] = 'Brutto animale velenoso!';
$responses['pietro'][] = 'Gli ho detto chiudi i becco non parlare!';
$responses['pietro'][] = 'Brutta sudicia velenosa!';
$responses['pietro'][] = 'Brutta sudicia velenosa e diavola!';

$text = trim($text);
$text = strtolower($text);
header("Content-Type: application/json");

$response = '';

if(strpos($text, "/start") === 0 || $text=="benvenuto pietro")
{
	$response = "Un saluto a tutte le coppiette";
}	
elseif($text=="ciao pietro")
{
	$response = "ciao da i'vampa";
}	
elseif($text=="benvenuto")
{
	$response = "ciao da i'vampa";
}
elseif($text=="ciao pacciani")
{
	$response = "ciao $username";
}
elseif($text=="moio")
{
	$response = "Sarebbe anche ora, ho un mucchio di roba da esportare";
}

else
{
	foreach($responses as $key => $value){
		if(strpos(strtolower($text), $key)){
			$response = $responses[$key][rand(0, sizeof($responses[$key]) - 1)];
		}
	}
}


$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);

