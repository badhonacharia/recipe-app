<?php
include "includes/header.php";

$id = $_GET['id'] ?? '';

$url = "https://www.themealdb.com/api/json/v1/1/lookup.php?i=$id";
$data = json_decode(file_get_contents($url), true);
$meal = $data['meals'][0];
?>

<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
  <img src="<?= $meal['strMealThumb'] ?>" class="rounded w-full">
  <h1 class="text-2xl font-bold mt-4"><?= $meal['strMeal'] ?></h1>
  <p class="mt-2 text-gray-600">
    Country: <?= $meal['strArea'] ?>
  </p>

  <h2 class="font-bold mt-4">Instructions</h2>
  <p class="mt-2"><?= nl2br($meal['strInstructions']) ?></p>
</div>

<?php include "includes/footer.php"; ?>
