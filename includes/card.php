<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<?php
echo "<div class='card' style='width: 18rem;'> ";
  echo "<img src='{$imageUrl}' class='card-img-top' >";
  echo "<div class='card-body'>";
  echo "  <h5 class='card-title'>{$name}</h5>";
   echo " <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card’s content.</p>";
   echo " <a href='#' class='btn btn-primary'>Go somewhere</a>";
 echo " </div>";
echo "</div>";
?>
<body>

