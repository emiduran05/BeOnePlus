<?php 

function set_api(){

    $apiUrl = 'https://api.spreadconnect.app/articles';
    $apiKey = '73d60ff1-2ee2-4b79-b3bc-96f38aa88bbd'; // Reemplaza con tu clave de la API de SPOD

    $ch = curl_init();


    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); /*NO incluir en el git push, siempre comentar*/


    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'X-SPOD-ACCESS-TOKEN: ' . $apiKey
    ]);

    $response = curl_exec($ch);

    curl_close($ch);

    $data = json_decode($response, TRUE);

    

for($i = 0; $i < count($data["items"]); $i++):

    $productosAgrupados[$i] = [];
    
    
    foreach($data["items"][$i]["variants"] as $element){
        $appearanceId = $element["appearanceId"];
        $size = $element["sizeName"];
        $colorName = $element["appearanceName"];
        $HEX = $element["appearanceColorValue"];
        $index = array_search($appearanceId, array_column($productosAgrupados[$i], 'appearanceId'));
    
        if($index === false){
            $productosAgrupados[$i][] = [
                "appearanceId" => $appearanceId,
                "colorName" => $colorName,
                "hex" => $HEX,
                "sizes" => [$size],
                "imageUrl" => []
            ];
        }else{
            if (!in_array($size, $productosAgrupados[$i][$index]['sizes'])) {
                $productosAgrupados[$i][$index]['sizes'][] = $size;
            }
        }
    
    }
    
    
    
    foreach($data["items"][$i]["images"] as $element){
        $appearanceId = $element["appearanceId"];
        $urlImage = $element["imageUrl"];
        $index = array_search($appearanceId, array_column($productosAgrupados[$i], 'appearanceId'));
    
    
        if (!in_array($size, $productosAgrupados[$i][$index]['imageUrl'])) {
            $productosAgrupados[$i][$index]['imageUrl'][] = $urlImage;
        }
    
    
    }
    
    endfor;

    return $productosAgrupados;
};