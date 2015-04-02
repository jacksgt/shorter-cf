<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <script src="//use.edgefonts.net/vera-sans.js"></script>
  <title>Your Shorter.cf URL has been created!</title>
  <link rel="stylesheet" type="text/css" href="main.css">
  <script type="text/javascript" src="script.js"></script>
  <style>
    main { text-align: center; color: #FFFFFF; }
    a.link { color: #222222; } 
  </style>
</head>
<body>
<div id="wrapper">
  <a href="http://www.shorter.cf" target="_self" class="nounderline">
  <header>
    <div id="banner"><div id="maincolor">Shorter</div><div id="subcolor">.cf</div></div>
    <div id="description">Make your long URLs a lot shorter!</div>
  </header>
  </a>
  <main>
    <h2>Your Shorter.cf URL has been created successfully!</h2>
    <p>Simply copy & paste the following link:</p>
    <div id="link">

<!-- <a href="$LINK" alt="Link to $LINK" target="_blank">$LINK</a> -->


<?php
function execute() {
  $rString = getRandomString(5);
  $path = getcwd() . "/" .  $rString;
  
  $page_part1 = "<!DOCTYPE html><html><head><meta http-equiv=\"refresh\" content=\"0; URL=";
  $page_part2 = "\"></head></html>";

  if(file_exists($path)) {
    execute(); break; 
  } else {
    mkdir($path, 0755);
    $file = fopen($path . "/index.html", "w") or die("Unable to open file!");
    $text = $page_part1 . $_POST["url"] . $page_part2;
    fwrite($file, $text);
    fclose($file);
    
    logaction($_POST["url"], $rString);

    $link = "http://shorter.cf/" . $rString;
    
    echo "<a href=\"$link\" alt=\"Link to $link\" target=\"_blank\">$link</a>";
   echo "<div id=\"addurl\">" . $_POST["url"] . ";" . $link . "</div>";
   }
}

function logaction($clearurl, $shorturl) {
  $date = getdate();
  $bufdate = $date["year"] . "-" . $date["mon"] . "-" . $date["mday"] . " " . $date["hours"] . ":" . $date["minutes"];
  $log .= "<> Logging user submitted form @ " . $bufdate . " </> \n";

  $log .= "<clear-url>" . $clearurl . "</clear-url>" . "\n";
  $log .= "<short-url>" . $shorturl . "</short-url>" . "\n";

  $log .= "<> \n \n";

  file_put_contents(getcwd() . "/.log", $log, FILE_APPEND | LOCK_EX);
}

function getRandomString($length) { 
  $randomString;  // this variable will be returned

  for( $i=$length; $i>0; $i--) {    // iterate the following code $length -times
    // call rand() for a random Int between 0 and 25, convert it to a letter
    $randomString .= convertInt(mt_rand(0, 25));
  }

  return $randomString;
}

function convertInt($integer) {
  switch ($integer) {
    case 0:
       return "a"; break;
    case 1:
       return "b"; break;
    case 2:
       return "c"; break;
    case 3:
       return "d"; break;
    case 4:
       return "e"; break;
    case 5:
       return "f"; break;
    case 6:
       return "g"; break;
    case 7:
       return "h"; break;
    case 8:
       return "i"; break;
    case 9:
       return "j"; break;
    case 10:
       return "k"; break;
    case 11:
       return "l"; break;
    case 12:
       return "m"; break;
    case 13:
       return "n"; break;
    case 14:
       return "o"; break;
    case 15:
       return "p"; break;
    case 16:
       return "q"; break;
    case 17:
       return "r"; break;
    case 18:
       return "s"; break;
    case 19:
       return "t"; break;
    case 20:
       return "u"; break;
    case 21:
       return "v"; break;
    case 22:
       return "w"; break;
    case 23:
       return "x"; break;
    case 24:
       return "y"; break;
    case 26:
       return "z"; break;
    default:
       return convertInt(mt_rand(0,25)); break;
    }
}

execute();
?>

  </div>
 </main>
  <div id="recent-urls-wrapper"></div>
</div>
<footer>
    By using the service <a href="http://shorter.cf">Shorter.cf</a> you are
    agreeing to our <div id="terms" onclick="viewTOS()">Terms of Service</div>
</footer>
</body>
</html>

