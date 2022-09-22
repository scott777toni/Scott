<?php
class bin
{

    public function getbank($bin)
    {
		$bin = substr($bin,0,6);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://lookup.binlist.net/$bin");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.61 Safari/537.36");
        $html = curl_exec($ch);
        $json = json_decode($html);
		$format = "📌" . $json->type . " / ". $json->brand . " / ".$json->bank->name;
		return $format;
    }
}
?>