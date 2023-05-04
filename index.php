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
$filteredHotels = [];

// if (isset($_GET['vote'])) {
//     foreach ($hotels as $hotel) {
//         if ($hotel['vote'] >= $_GET['vote']) {
//             $filteredHotels = $hotel;
//         }
//     }
// } else {
//     $filteredHotels = $hotels;
// }
if (isset($_GET['parking'])) {
    foreach ($hotels as $hotel) {
        if ($hotel['parking']) {
            $filteredHotels[] = $hotel;
        }
    }
} else {
    $filteredHotels = $hotels;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Hotel</title>
</head>

<body class="bg-dark">
    <div class="container mt-5">
        <h1 class="text-center text-primary mb-5 fw-bold display-1">Hotel Mamma mia che passione!</h1>
        <form class="d-flex align-items center justify-content-center" action="index.php" method="get">
            <div class="form-check mb-3 mt-1 text-light">
                <input class="form-check-input" type="checkbox" name="parking" id="parkingCheckbox" value="1">
                <label class="form-check-label" for="parkingCheckbox">
                    Mostra solo hotel con parcheggio
                </label>
                <label class="ms-3" for="vote">Voto:</label>
                <select name="vote" id="vote">
                    <option selected value="0">all</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mb-3 mx-3">Cerca</button>
        </form>
        <div class="d-flex align-items-center justify-content-center">

            <div class="card text-bg-info">
                <div class="card-header py-2 text-light ">
                    <h3 class="text-center fw-bold  mt-2">Hotel con stanze al momento disponibili</h3>
                </div>
                <div class="card-body p-0">
                    <table class="table table-primary table-striped text-center border-light">
                        <thead>
                            <tr class="text-uppercase">
                                <th scope="col">Nome Hotel</th>
                                <th scope="col">Descrizione</th>
                                <th scope="col">Parcheggio</th>
                                <th scope="col">Voto</th>
                                <th scope="col">Distanza dal centro</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($filteredHotels as $hotel) {
                            ?>
                                <tr>
                                    <th scope="row"> <?php echo $hotel['name'] ?></th>
                                    <td> <?php echo $hotel['description'] ?> </td>
                                    <td> <?php echo $hotel['parking'] ? 'Provvisto di parcheggio interno' : 'Non provvisto di parcheggio interno' ?></td>
                                    <td><?php echo $hotel['vote'] ?> su 5</td>
                                    <td><?php echo $hotel['distance_to_center'] ?> Km</td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>

</body>

</html>