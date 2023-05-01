<?php
$lat = $_POST['lat'];
$lng = $_POST['lng'];
$id = $_POST['id'];

echo "hola soy lat".$lat;
echo $lng;
echo "soy id".$id;


$index = 0;

        //get json data
        $data = file_get_contents('../../database/empleados.json');
        $data_array = json_decode($data);

        //assign the data to selected index

        //$row = $data_array[$index];
        foreach($data_array as $row){
            if ($row->id == $id) {
                $input = array(
                    'id' => $id,
                    'lat' => $lat,
                    'lng' => $lng,
                    'nombre' => $row->nombre
                );
                $data_array[$index] = $input;

            //encode back to json
            $data = json_encode($data_array, JSON_PRETTY_PRINT);
            file_put_contents('../../database/empleados.json', $data);
            }
            $index++;
        }
    

       
            

            //update the selected index
