<?php
define("BOT_TOKEN", "424659159:AAHh_Q9wAZ00qe-FWe6Tk3kNtSG9F5ea1hg");		//token
$content = file_get_contents("php://input");
$update = json_decode($content, true);										//nessuna idea di cosa sia json_decode, sta nella cartella dropbox
define('BOTAPI', 'https://api.telegram.org/bot' . $BOT_TOKEN . '/');


if(!$update)																
{
  exit;
}

$url='http://spesecasapaolo-168013.appspot.com/'; 

 $GLOBALS['APUMessages'] = array('Il tabasco è il profumo della vita','Sogno di essere un sognatore' );												//array delle frasi random
$GLOBALS['Lotteria'] = array('Filippo', 'Federico','Ludovico','Mattheu','Pietro','Sara','Michele');		//array delle persone per lotteria


//Parte da non toccare, sono le definizioni dei messaggi, della chat e dell'user. Ogni volta che mandiamo un messaggio
//da qualche parte dove c'è cacciolinobot questi dati vengono inviati di default. ISSET serve solo a controllare che il 
//messaggio non sia NULL, mentre per il resto sto solo andando a prendere il pezzo giusto della stringa message.

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";
$botUrl = "https://api.telegram.org/bot" . BOT_TOKEN . "/sendPhoto";
$text = trim($text);
$text = strtolower($text);
//salvare le ChatId in un vettore	
$Chat_vector[]=array();
if (in_array ( $chatId , $Chat_Vector ))
{
	array_push($Chat_vector, $ChatId);	
	};


//
$lotto ="";
header("Content-Type: application/json");
$response = '';

//zero
if(strpos($text, "/start") === 0)
{
	$response = "Ciao $firstname, benvenuto!";
}

// uno

//I comandi da uno a ***dici incluso funzionano tutti allo stesso modo. STRSTR(' ',' ') funziona per trovare
//la seconda stringa dentro la prima, quindi ogni volta che viene rilevato nel testo del messaggio una parola 
//esegue il comando. In questi casi ho messo un if per far dire al bot "MATTHEU" se il messaggio viene mandato
//dal cacciolino. Non so ancora se funziona o meno
elseif(strstr($text, "mese"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "$firstname tempo un mese e ti batto";
	}
}
// due
elseif(strstr($text, "buono"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Sì, ma in Sicilia si fa più buono";
	}
}
// tre
elseif(strstr($text, "olio"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Sì, ma in Sicilia ci mettiamo più olio";
	}
}
// quattro
elseif(strstr($text, "a cp"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Io";
	}
}
// cinque
elseif(strstr($text, "culo"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "cane";
	}
}
// sei
elseif(strstr($text, "canzone"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Forse la canzone è Hey Judge ";
	}
}
// sette
elseif(strstr($text, "mattheu"))
{
	$response="MATTHEU!";
}
// sette
elseif(strstr($text, "mamma"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Nessuno batte mia mamma";
	}
}
// otto

// nove
elseif(strstr($text, "rocket league"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Mi dovete chiamare signore dei razzi, cazzo!";
	}
}
// dieci
elseif(strstr($text, "schema"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Forse volevi dire SCHIEMA?";
	}
}
// undici
elseif(strstr($text, "fratello"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "https://www.youtube.com/watch?v=dQw4w9WgXcQ";
	}
}
// dodici
elseif(strstr($text, "studio"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Magari possiamo iniziare a studiare tra mezz'ora";
	}
}
// tredici
elseif(strstr($text, "studiamo"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Ma non avevamo detto che oggi non si studiava?";
	}
}
// quattordici
elseif(strstr($text, "studiare"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Basta studiare giochiamo a LOL";
	}
}
// quindici
elseif(strstr($text, "crimin"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Sono un criminale e tu sei il mio crimineeeeeeeee";
	}
}

// sedici
elseif(strstr($text, "broccoli"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Vuoi broccoli?";
	}
}
//diciassette
elseif(strstr($text, "tabasco"))
{
	if(strstr($firstname, "matteo"))
	{$response = "MATTHEU!";}
	else{
	$response = "Mettiamoci sopra il tabasco! Il tabasco sta bene su tutto!";
	}
}

//Mandare messaggi a tutti quelli in Chat_Vector
elseif(strstr($text, "Manda un messaggio a tutti"))
{
	foreach($Chat_Vector as $chatId)
	{
	$text='Sciao beli';
	$parameters = array('chat_id' => $chatId, "text" => $text);
// method è il metodo per l'invio di un messaggio (cfr. API di Telegram)
$parameters["method"] = "sendMessage";
// converto e stampo l'array JSON sulla response
echo json_encode($parameters);
	}
}

//Leggi diciotto
elseif(strstr($text, "random"))
{
	$response =APUMessage();
}

//diciassette, qui una volta c'era un comando che non ho più rimesso, prima o poi lo farò
elseif(strstr($text, "/help"))
{
	$response ="Ciao $firstname qui c'è una lista dei comandi disponibili: \n Lotteria \n Testa o croce \n Random \n Simmetria matrice \n Rendiconto $firstname \n Cacciolino consiglia una ricetta \n Cacciolino dimmi una ricetta a caso"  ;
}

// diciotto, lotteria
// Usa un comando che non ho creato io (la funzione Lotteria()) che è la stessa che fa funzionare APUMessage.
elseif(strstr($text, "lotteria"))
{
	$lotto=Lotteria();
	$response ="E il vincitore della lotteria è $lotto";
}



//diciannove, foto toc
//questo è il codice per mandare fotografie. Bisogna caricare nella cartella dropbox la foto e cambiare 
//il nome file qui sotto.
elseif(strstr($text, "testa o croce"))
{
if(bool_rand()==true)
{
	$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("croce.png")), 'caption' => "Croce");
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
	curl_setopt($ch, CURLOPT_URL, $botUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	// read curl response
	$output = curl_exec($ch);
	}
else
{
	$postFields = array('chat_id' => $chatId, 'photo' => new CURLFile(realpath("testa.png")), 'caption' => "Testa");
	$ch = curl_init(); 
	curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));
	curl_setopt($ch, CURLOPT_URL, $botUrl); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
	// read curl response
	$output = curl_exec($ch);
	}
}

//venti
elseif(strstr($text, "cacciolinobot"))
{
	$response = "Ciao, sono il cacciolinobot. Come stai? Se vuoi vedere una lista dei miei comandi scrivi /help";
	
}
//git
elseif(strstr($text, "git"))
{
	$response = "hub";
	
}

//questo serve per fare uh uh quando si riceve una foto
elseif(isset($message['photo']))
{
	$response = "Uh uh!";
}
//Lupus in Telegram
elseif(strstr($text, "lupus in telegram"))
{
	$response = ":hearth:";
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////
//leggere i dati dell'app
elseif(strstr($text, "rendiconto federico")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[14]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[15]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[16]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[17]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[18]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[19]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[20]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[21]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[22]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto filippo")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[23]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[24]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[25]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[26]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[27]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[28]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[29]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[30]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[31]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto gabriele")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[32]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[33]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[34]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[35]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[36]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[37]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[38]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[39]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[40]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto ivan")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[41]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[42]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[43]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[44]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[45]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[46]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[47]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[48]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[49]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto ludovico")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[53]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[54]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[55]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[56]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[57]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[58]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[59]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[60]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[61]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto matteo")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[62]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[63]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[64]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[65]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[66]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[67]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[68]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[69]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[70]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto michele")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[71]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[72]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[73]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[74]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[75]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[76]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[77]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[78]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[79]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto pietro")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[81]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[82]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[83]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[84]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[85]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[86]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[87]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[88]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[89]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}
elseif(strstr($text, "rendiconto sara")){
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[90]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[91]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[92]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[93]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[94]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[95]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[96]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[97]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[98]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1="Federico ".$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=" Filippo ".$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=" Gabriele ".$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=" Ivan ".$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=" Ludovico ".$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=" Matteo ".$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=" Michele ".$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=" Pietro ".$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=" Sara ".$row->nodeValue;
		}
	}
	
	$culo=$culo1.$culo2.$culo3.$culo4.$culo5.$culo6.$culo7.$culo8.$culo9;
	
}
	$response=$culo;
}
}

////////////////////////simmetria////////////////////////////
elseif(strstr($text, "simmetria matrice"))
{
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[14]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[15]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[16]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[17]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[18]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[19]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[20]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[21]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[22]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo10=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}	
	
	
} //federico
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[23]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[24]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[25]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[26]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[27]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[28]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[29]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[30]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[31]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo20=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}
} //filippo
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[32]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[33]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[34]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[35]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[36]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[37]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[38]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[39]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[40]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo30=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}

} //gabriele
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[41]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[42]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[43]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[44]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[45]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[46]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[47]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[48]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[49]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo40=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}

} //ivan
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[53]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[54]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[55]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[56]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[57]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[58]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[59]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[60]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[61]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo50=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}
} //ludovico
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[62]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[63]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[64]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[65]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[66]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[67]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[68]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[69]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[70]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo60=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}

} //matteo
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[71]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[72]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[73]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[74]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[75]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[76]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[77]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[78]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[79]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo70=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}

} //michele
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[81]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[82]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[83]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[84]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[85]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[86]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[87]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[88]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[89]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo80=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
	
}

} //pietro
{
	$html = file_get_contents($url); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);

	//get all the h2's with an id
	$row1 = $pokemon_xpath->query('//table[3]/tr[90]/td[2]');
	$row2 = $pokemon_xpath->query('//table[3]/tr[91]/td[2]');
	$row3 = $pokemon_xpath->query('//table[3]/tr[92]/td[2]');
	$row4 = $pokemon_xpath->query('//table[3]/tr[93]/td[2]');
	$row5 = $pokemon_xpath->query('//table[3]/tr[94]/td[2]');
	$row6 = $pokemon_xpath->query('//table[3]/tr[95]/td[2]');
	$row7 = $pokemon_xpath->query('//table[3]/tr[96]/td[2]');
	$row8 = $pokemon_xpath->query('//table[3]/tr[97]/td[2]');
	$row9 = $pokemon_xpath->query('//table[3]/tr[98]/td[2]');

	if($row1->length > 0){
		foreach($row1 as $row){
			$culo1=$row->nodeValue;
		}
	}
	if($row2->length > 0){
		foreach($row2 as $row){
			$culo2=$row->nodeValue;
		}
	}
	if($row3->length > 0){
		foreach($row3 as $row){
			$culo3=$row->nodeValue;
		}
	}
	if($row4->length > 0){
		foreach($row4 as $row){
			$culo4=$row->nodeValue;
		}
	}
	if($row5->length > 0){
		foreach($row5 as $row){
			$culo5=$row->nodeValue;
		}
	}
	if($row6->length > 0){
		foreach($row6 as $row){
			$culo6=$row->nodeValue;
		}
	}
	if($row7->length > 0){
		foreach($row7 as $row){
			$culo7=$row->nodeValue;
		}
	}
	if($row8->length > 0){
		foreach($row8 as $row){
			$culo8=$row->nodeValue;
		}
	}
	if($row9->length > 0){
		foreach($row9 as $row){
			$culo9=$row->nodeValue;
		}
	}
	
	$culo90=floatval(ltrim($culo1, '"'))+floatval(ltrim($culo2, '"'))+floatval(ltrim($culo3, '"'))+floatval(ltrim($culo4, '"'))+floatval(ltrim($culo5, '"'))+floatval(ltrim($culo6, '"'))+floatval(ltrim($culo7, '"'))+floatval(ltrim($culo8, '"'))+floatval(ltrim($culo9, '"'));
}

} //sara
$parziale=$culo10+$culo20+$culo30+$culo40+$culo50+$culo60+$culo70+$culo80+$culo90;
$response="La somma totale degli elementi della matrice è $parziale.";
}
/////////////////////////////////////////////////////////////

elseif(strstr($text, "cacciolino consiglia una ricetta"))
{
	$html = file_get_contents('http://www.giallozafferano.it/Ultime-ricette/'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);
	
	$row1 = $pokemon_xpath->query('//h3[position() = 1]');
	
		if($row1->length > 0){
		foreach($row1 as $row){
			$answer=$row->nodeValue;
		}
	}
	$indirizzo=$name = str_replace(' ', '-', $answer);
	$response="Hai già provato $answer? ecco il link \n http://ricette.giallozafferano.it/".$indirizzo;
	
	}
}

elseif(strstr($text, "cacciolino dimmi una ricetta a caso"))
{
	
	$numeropagina=rand(2,30);
	$html = file_get_contents('http://www.giallozafferano.it/Ultime-ricette/page'.$numeropagina); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);
	
	$row1 = $pokemon_xpath->query('//h3[position() = 1]');
	
		if($row1->length > 0){
		foreach($row1 as $row){
			$answer=$row->nodeValue;
		}
	}
	$indirizzo=$name = str_replace(' ', '-', $answer);
	$response="Hai già provato $answer? ecco il link \n http://ricette.giallozafferano.it/".$indirizzo;
	
	}
}


$parameters = array('chat_id' => $chatId, "text" => $response);
$parameters["method"] = "sendMessage";
echo json_encode($parameters);


function APUMessage()
	{
		return $GLOBALS['APUMessages'][array_rand($GLOBALS['APUMessages'])];
	}
	
	
function Lotteria()
	{
		return $GLOBALS['Lotteria'][array_rand($GLOBALS['Lotteria'])];
	}
	
	
function bool_rand() {
   return rand(0, 99) >= 50;
}

/* gets the data from a URL */
 
function get_data($url) {
	
	$ch = curl_init();
	$timeout = 5;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

