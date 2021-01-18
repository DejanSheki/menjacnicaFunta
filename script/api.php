<?php

$response = file_get_contents('https://kurs.resenje.org/api/v1/rates/today');
$response = json_decode($response);
$rates = $response->rates;

//////// oduzimanje, dodavanje procenta i zaokruzivanje decimala odredjenih valuta///////////////
function percentAdd($num, $per) {
  $per = str_replace("%", "", $per);
  $res = $num + ($num * ($per / 100));
  return $res;
}
function percentReduce($x, $y) {
  $resu = $x - ($x * ($y / 100));
  return $resu;
}


for ( $i = 0; $i < count($rates); $i++) {

    if ($rates[$i]->code === "EUR") {
      $rates[$i]->cash_buy = percentAdd($rates[$i]->cash_buy, 0.25);
      $rates[$i]->cash_sell = percentReduce($rates[$i]->cash_sell, 0.25);
      // echo ($rates[$i]->cash_buy."<br>");
      // echo ($rates[$i]->cash_sell."<br>");
    }
    else if ($rates[$i]->code === "USD" || $rates[$i]->code === "CHF") {
      $rates[$i]->cash_buy = percentReduce($rates[$i]->cash_buy, 1.5);
      $rates[$i]->cash_sell = percentAdd($rates[$i]->cash_sell, 1.5);
      // echo ($rates[$i]->cash_buy."<br>");
      // echo ($rates[$i]->cash_sell."<br>");
    }
    else if ($rates[$i]->code === "AUD" || $rates[$i]->code === "CAD" || $rates[$i]->code === "HRK" || $rates[$i]->code === "DKK" || $rates[$i]->code === "HUF" || $rates[$i]->code === "NOK" || $rates[$i]->code === "SEK" || $rates[$i]->code === "GBP" || $rates[$i]->code === "BAM" || $rates[$i]->code === "RUB" || $rates[$i]->code === "CNY" || $rates[$i]->code === "JPY" || $rates[$i]->code === "PLN" || $rates[$i]->code === "CZK") {
      $rates[$i]->exchange_buy = percentReduce($rates[$i]->exchange_middle, 3);
      $rates[$i]->exchange_sell = percentAdd( $rates[$i]->exchange_middle, 3);
      // echo ($rates[$i]->exchange_buy."<br>");
      // echo ($rates[$i]->exchange_sell."<br>");
  }
}
for ( $i = 0; $i < count($rates); $i++) {
    if ($rates[$i]->code === "EUR" || $rates[$i]->code === "USD" || $rates[$i]->code === "CHF") {
      $rates[$i]->cash_buy = round($rates[$i]->cash_buy,4);
      $rates[$i]->cash_sell = round($rates[$i]->cash_sell,4);
      // echo $rates[$i]->cash_buy."<br>";
    }
}

$allocatedCurrencies = [];
// print_r($allocatedCurrencies[2]);


for ( $i = 0; $i < count($rates); $i++) {
  if($rates[$i]->code === "EUR") {
    $eur = new stdClass;
    $eur->id = 0;
    $eur->slika = "img/Flags-Icon-Set/48x48/EU1.png";
    $eur->valuta = "Evro";
    $eur->oznaka = $rates[$i]->code;
    $eur->apoen = $rates[$i]->parity;
    $eur->kup = $rates[$i]->cash_buy;
    $eur->sre = $rates[$i]->exchange_middle;
    $eur->pro = $rates[$i]->cash_sell;
  }
  else if($rates[$i]->code === "USD") {
    $usd = new stdClass;
    $usd->id = 1;
    $usd->slika = "img/Flags-Icon-Set/48x48/USA.png";
    $usd->valuta = "Američki Dolar";
    $usd->oznaka = $rates[$i]->code;
    $usd->apoen = $rates[$i]->parity;
    $usd->kup = $rates[$i]->cash_buy;
    $usd->sre = $rates[$i]->exchange_middle;
    $usd->pro = $rates[$i]->cash_sell;
  }
  else if($rates[$i]->code === "CHF") {
    $chf = new stdClass;
    $chf->id = 2;
    $chf->slika = "img/Flags-Icon-Set/48x48/CH1.png";
    $chf->valuta = "Švajcarski Franak";
    $chf->oznaka = $rates[$i]->code;
    $chf->apoen = $rates[$i]->parity;
    $chf->kup = $rates[$i]->cash_buy;
    $chf->sre = $rates[$i]->exchange_middle;
    $chf->pro = $rates[$i]->cash_sell;
  }
  else if($rates[$i]->code === "AUD") {
    $aud = new stdClass;
    $aud->id = 3;
    $aud->slika = "img/Flags-Icon-Set/48x48/AU.png";
    $aud->valuta = "Australijski Dolar";
    $aud->oznaka = $rates[$i]->code;
    $aud->apoen = $rates[$i]->parity;
    $aud->kup = round($rates[$i]->exchange_buy, 4);
    $aud->sre = $rates[$i]->exchange_middle;
    $aud->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "GBP") {
    $gbp = new stdClass;
    $gbp->id = 4;
    $gbp->slika = "img/Flags-Icon-Set/48x48/GB.png";
    $gbp->valuta = "Funta Sterlinga";
    $gbp->oznaka = $rates[$i]->code;
    $gbp->apoen = $rates[$i]->parity;
    $gbp->kup = round($rates[$i]->exchange_buy, 4);
    $gbp->sre = $rates[$i]->exchange_middle;
    $gbp->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "CAD") {
    $cad = new stdClass;
    $cad->id = 5;
    $cad->slika = "img/Flags-Icon-Set/48x48/CA.png";
    $cad->valuta = "Kanadski dolar";
    $cad->oznaka = $rates[$i]->code;
    $cad->apoen = $rates[$i]->parity;
    $cad->kup = round($rates[$i]->exchange_buy, 4);
    $cad->sre = $rates[$i]->exchange_middle;
    $cad->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "SEK") {
    $sek = new stdClass;
    $sek->id = 6;
    $sek->slika = "img/Flags-Icon-Set/48x48/SE.png";
    $sek->valuta = "Švedska Kruna";
    $sek->oznaka = $rates[$i]->code;
    $sek->apoen = $rates[$i]->parity;
    $sek->kup = round($rates[$i]->exchange_buy, 4);
    $sek->sre = $rates[$i]->exchange_middle;
    $sek->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "DKK") {
    $dkk = new stdClass;
    $dkk->id = 7;
    $dkk->slika = "img/Flags-Icon-Set/48x48/DK.png";
    $dkk->valuta = "Danska Kruna";
    $dkk->oznaka = $rates[$i]->code;
    $dkk->apoen = $rates[$i]->parity;
    $dkk->kup = round($rates[$i]->exchange_buy, 4);
    $dkk->sre = $rates[$i]->exchange_middle;
    $dkk->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "NOK") {
    $nok = new stdClass;
    $nok->id = 8;
    $nok->slika = "img/Flags-Icon-Set/48x48/NO.png";
    $nok->valuta = "Norveška Kruna";
    $nok->oznaka = $rates[$i]->code;
    $nok->apoen = $rates[$i]->parity;
    $nok->kup = round($rates[$i]->exchange_buy, 4);
    $nok->sre = $rates[$i]->exchange_middle;
    $nok->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "HRK") {
    $hrk = new stdClass;
    $hrk->id = 9;
    $hrk->slika = "img/Flags-Icon-Set/48x48/HR.png";
    $hrk->valuta = "Hrvatska Kuna";
    $hrk->oznaka = $rates[$i]->code;
    $hrk->apoen = $rates[$i]->parity;
    $hrk->kup = round($rates[$i]->exchange_buy, 4);
    $hrk->sre = $rates[$i]->exchange_middle;
    $hrk->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "BAM") {
    $bam = new stdClass;
    $bam->id = 10;
    $bam->slika = "img/Flags-Icon-Set/48x48/BA.png";
    $bam->valuta = "Bosanska Marka";
    $bam->oznaka = $rates[$i]->code;
    $bam->apoen = $rates[$i]->parity;
    $bam->kup = round($rates[$i]->exchange_buy, 4);
    $bam->sre = $rates[$i]->exchange_middle;
    $bam->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "RUB") {
    $rub = new stdClass;
    $rub->id = 11;
    $rub->slika = "img/Flags-Icon-Set/48x48/RU.png";
    $rub->valuta = "Ruska Rublja";
    $rub->oznaka = $rates[$i]->code;
    $rub->apoen = $rates[$i]->parity;
    $rub->kup = round($rates[$i]->exchange_buy, 4);
    $rub->sre = $rates[$i]->exchange_middle;
    $rub->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "CNY") {
    $cny = new stdClass;
    $cny->id = 12;
    $cny->slika = "img/Flags-Icon-Set/48x48/CN.png";
    $cny->valuta = "Kineski Juan";
    $cny->oznaka = $rates[$i]->code;
    $cny->apoen = $rates[$i]->parity;
    $cny->kup = round($rates[$i]->exchange_buy, 4);
    $cny->sre = $rates[$i]->exchange_middle;
    $cny->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "JPY") {
    $jpy = new stdClass;
    $jpy->id = 13;
    $jpy->slika = "img/Flags-Icon-Set/48x48/JP.png";
    $jpy->valuta = "Japanski Jen";
    $jpy->oznaka = $rates[$i]->code;
    $jpy->apoen = $rates[$i]->parity;
    $jpy->kup = round($rates[$i]->exchange_buy, 4);
    $jpy->sre = $rates[$i]->exchange_middle;
    $jpy->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "HUF") {
    $huf = new stdClass;
    $huf->id = 14;
    $huf->slika = "img/Flags-Icon-Set/48x48/HU.png";
    $huf->valuta = "Mađarska Forinta";
    $huf->oznaka = $rates[$i]->code;
    $huf->apoen = $rates[$i]->parity;
    $huf->kup = round($rates[$i]->exchange_buy, 4);
    $huf->sre = $rates[$i]->exchange_middle;
    $huf->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "CZK") {
    $czk = new stdClass;
    $czk->id = 15;
    $czk->slika = "img/Flags-Icon-Set/48x48/CZ.png";
    $czk->valuta = "Češka Kruna";
    $czk->oznaka = $rates[$i]->code;
    $czk->apoen = $rates[$i]->parity;
    $czk->kup = round($rates[$i]->exchange_buy, 4);
    $czk->sre = $rates[$i]->exchange_middle;
    $czk->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "PLN") {
    $pln = new stdClass;
    $pln->id = 16;
    $pln->slika = "img/Flags-Icon-Set/48x48/PL.png";
    $pln->valuta = "Poljski Zlot";
    $pln->oznaka = $rates[$i]->code;
    $pln->apoen = $rates[$i]->parity;
    $pln->kup = round($rates[$i]->exchange_buy, 4);
    $pln->sre = $rates[$i]->exchange_middle;
    $pln->pro = round($rates[$i]->exchange_sell, 4);
  }
  else if($rates[$i]->code === "TRY") {
    $try = new stdClass;
    $try->id = 17;
    $try->slika = "img/Flags-Icon-Set/48x48/TR.png";
    $try->valuta = "Turska Lira";
    $try->oznaka = $rates[$i]->code;
    $try->apoen = $rates[$i]->parity;
    $try->kup = round($rates[$i]->exchange_buy, 4);
    $try->sre = $rates[$i]->exchange_middle;
    $try->pro = round($rates[$i]->exchange_sell, 4);
  }
}
array_push($allocatedCurrencies, $eur, $usd, $chf, $aud, $gbp, $cad, $sek,$dkk, $nok, $hrk, $bam, $rub, $cny, $jpy, $huf, $czk, $pln, $try);

// echo $currency->{'valuta'}."<br>";
// echo $currency->{'oznaka'}."<br>";
// echo $currency->{'apoen'}."<br>";
// echo $currency->{'kup'}."<br>";
// echo $currency->{'sre'}."<br>";
// echo $currency->{'pro'}."<br>";



// echo $dolar->{'valuta'}."<br>";
// echo $dolar->{'oznaka'}."<br>";
// echo $dolar->{'apoen'}."<br>";
// echo $dolar->{'kup'}."<br>";
// echo $dolar->{'sre'}."<br>";
// echo $dolar->{'pro'}."<br>";




?>





