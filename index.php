<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $park = $_GET['park'];

    if ($park === 'si') {
        $filteredHotels = array_filter($hotels, function($hotel) {
            return $hotel['parking'] === true;
        });
    } elseif ($park === 'no') {
        $filteredHotels = array_filter($hotels, function($hotel) {
            return $hotel['parking'] === false;
        });
    } else {
        $filteredHotels = $hotels;
    };
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Hotels</title>
</head>
<body>
    <div>
        <form method="GET" action="index.php">
            <lable for="park">Parcheggio</lable>
            <select name="park" id="park">
                <option value="">Tutti</option>
                <option value="si">Disponibile</option>
                <option value="no">Non disponibile</option>
            </select>

            <button type="submit">Invia</button>
        </form>
    </div>
    <main>
        <table class="table table-striped text-center text-capitalize">
            <thead>
                <tr>
                    <?php foreach($hotels[0] as $hotel => $key){
                        echo '<th scope="col">' . $hotel . "</th>";
                    };
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($filteredHotels as $hotel){
                        echo "<tr>";

                        if($hotel['parking']){
                            $hotel['parking'] = 'Yes';

                        }else{
                            $hotel['parking'] = 'No';
                        }

                        foreach($hotel as $valeu => $key){
                            echo "<td>" . $key . "</td>";
                        };
                        echo "</tr>";
                    };
                ?>
            </tbody>
        </table>
    </main>
</body>
</html>