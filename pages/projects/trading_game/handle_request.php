<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST["action"] == "GET") {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.swiftswaff.com/trading-game/api/' . $_POST["uri"]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = json_decode(curl_exec($ch));
        
        echo json_encode($json, JSON_PRETTY_PRINT);
    }
    else if ($_POST["action"] == "CreateOffer") {
        $payload = json_encode(array(
            "user_id" => $_POST["user_id"],
            "item_id" => $_POST["item_id"],
            "price"   => $_POST["price"]
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.swiftswaff.com/trading-game/api/offer/create');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $json = json_decode(curl_exec($ch));

        echo json_encode($json, JSON_PRETTY_PRINT);
    }
    else if ($_POST["action"] == "BuyOffer") {
        $payload = json_encode(array(
            "offer_id" => $_POST["offer_id"],
            "buyer_id" => $_POST["buyer_id"]
        ));

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.swiftswaff.com/trading-game/api/offer/buy');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        $json = json_decode(curl_exec($ch));

        echo json_encode($json, JSON_PRETTY_PRINT);
    }
    exit;
}
?>