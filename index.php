<?php

$presentTime = new DateTime();
  // echo $presentTime->format('m-d-Y a H:i');
    $destinationTime = new DateTime();
    $destinationTime -> setDate(2025, 11, 16);
    $destinationTime -> setTime(13,40);
    $timeUntilDestinationTime = $presentTime->diff($destinationTime);
    $timeUntilDestinationTime->format('%y years %m months %d days %h hours %m minutes');

    //var_dump($destinationTime);

    function convertDiffToMinutes($timeUntilDestinationTime):int
    {
        $yMin = $timeUntilDestinationTime->format("%y") * 525600;  // convertir années en minutes
        $mMin = $timeUntilDestinationTime->format("%m") * 43800;  // convertir mois (en 31 jours) en minutes
        $dMin = $timeUntilDestinationTime->format("%d") * 1440;  // convertir jours en minutes
        $hMin = $timeUntilDestinationTime->format("%h") * 60;  // convertir heures en minutes
        $iMin = $timeUntilDestinationTime->format("%i");
    
        return $yMin + $mMin + $dMin + $hMin + $iMin;
    }

    
    

   

    //echo '<p class="clock">' . $destinationTime->format('m-d-Y a H:i') . '<p>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horloge numérique</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    
    <div class="clock">
        <span class="actual-time"> <?php echo 'Actual time : ' . '<br>' . $presentTime->format('m-d-Y a H:i');?> </span><br>
        <hr>
        <span class="destination-time"> <?php echo 'Destination time : ' . '<br>' . $destinationTime->format('m-d-Y a H:i');?> </span>
    </div>

    <div>
        <span class="timeLeft">  <?php echo 'Time left to reach destination : ' . $timeUntilDestinationTime->format('%y years %m months %d days %h hours %m minutes') ?> </span>;
    </div>

    <div class= 'carburant'>
        <?php echo 'You need ' . convertDiffToMinutes($timeUntilDestinationTime)/10000 . ' gallons of engine oil for your travel through time'; ?>
    </div>


</body>
</html>

