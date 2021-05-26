
<!-- zmiana cały plik -->
<?php
    require '../../back/conn.php';
    $sql = "SELECT * from user  JOIN notes ON user.user_id = notes.to_user_id where active = 1;";
    echo $sql;
    $result = $conn->query($sql);
    $json4 = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<?php
    $test = 50;
    echo '
    <div class="progress">
  <div class="progress-bar" role="progressbar" style="width:' . $test . '%"  aria-valuenow="' . $test . '" aria-valuemin="" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div class="progress">
  <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
</div>'
?>
    <h1>Najlepsi użytkownicy</h1>

<?php
foreach($json4 as $value){
    echo'
    <div>
    <div class="bg-blue-600 w-full h-16 flex pt-3">
    <button class="text-2xl text-white border-b-2 w-full accordion-button collapsed rate-rate" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">' .  $value['fname'] . ' ' .  $value['lname'] . '
        <div class="mt-1 ml-4 text-xl text-black">
        <span class="fa fa-star text-yellow-300"></span>
        <span class="fa fa-star text-yellow-300"></span>
        <span class="fa fa-star text-yellow-300"></span>
        <span class="fa fa-star"></span>
        <span class="fa fa-star"></span>
        </div>
        <p class="ml-4">4.1 average based on 254 reviews.</p>
    </button>
    
    </div>
    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
    <!-- tutaj rozwiń i wtedy wyświetlaj tabelę z ocenami (to co na dole) -->
    </div>';
}
?>
