<?php
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$id = $_POST['id'];
$nombre = $_POST['nombre'];

echo "hola soy lat" . $lat;
echo $lng;
echo "soy id" . $id;

//get json data
$jsonString = file_get_contents('../../database/empleados.json');
$data = json_decode($jsonString, true);
// Leer el contenido del archivo JSON


// Verificar si la ID no existe en el JSON
$idExistente = false;
foreach ($data as $item) {
    if ($item['id'] === $id) {
        $idExistente = true;
        break;
    }
}

// Si la ID no existe, agregar un nuevo elemento
if (!$idExistente) {
    $newData = array(
        "id" => $id,
        "lat" => $lat,
        "lng" => $lng,
        "nombre" => $nombre
    );
    $data[] = $newData;

    // Convertir el arreglo de nuevo a JSON
    $jsonData = json_encode($data, JSON_PRETTY_PRINT);

    // Escribir los datos en el archivo JSON
    file_put_contents('../../database/empleados.json', $jsonData);
} else {
    $index = 0;



    //assign the data to selected index

    //$row = $data_array[$index];
    foreach ($data_array as $row) {
        if ($row->id == $id) {
            $input = array(
                'id' => $id,
                'lat' => $lat,
                'lng' => $lng,
                'nombre' => $row->nombre
            );
            $data[$index] = $input;

            //encode back to json
            $jsonData = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('../../database/empleados.json', $jsonData);
        }
        $index++;
    }
}
