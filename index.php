<?php include "includes/header.php"; ?>

<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-3xl font-bold mb-6 text-center">
    🌍 Country Based Recipe Finder
  </h1>

  <input 
    id="searchInput"
    class="w-full p-3 border rounded"
    placeholder="Search recipe (chicken, pasta...)">

  <select 
    id="countrySelect"
    class="w-full p-3 border rounded mt-3">
    <option value="">All Countries</option>
    <option value="Indian">Indian</option>
    <option value="Italian">Italian</option>
    <option value="Mexican">Mexican</option>
    <option value="Chinese">Chinese</option>
  </select>

  <button 
    onclick="searchRecipes()"
    class="mt-4 bg-green-600 text-white px-6 py-3 rounded w-full">
    Search Recipes
  </button>

  <div 
    id="results"
    class="grid md:grid-cols-3 gap-6 mt-8">
  </div>
</div>

<script src="assets/js/app.js"></script>
<?php include "includes/footer.php"; ?>
