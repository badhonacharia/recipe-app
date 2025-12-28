function searchRecipes() {
  const q = document.getElementById("searchInput").value;
  const country = document.getElementById("countrySelect").value;

  document.getElementById("results").innerHTML =
    "<p class='text-center'>Loading...</p>";

  fetch(`api/fetch-recipes.php?q=${encodeURIComponent(q)}&country=${country}`)
    .then(res => res.json())
    .then(data => {
      let html = "";

      if (data.length === 0) {
        html = "<p class='text-center'>No recipes found</p>";
      } else {
        data.forEach(item => {
          html += `
            <div class="bg-white rounded shadow p-4">
              <img src="${item.image}" class="w-full h-48 object-cover rounded">
              <h3 class="mt-3 font-bold">${item.name}</h3>
              <a href="recipe.php?id=${item.id}" 
                 class="text-green-600">
                 View Recipe
              </a>
            </div>
          `;
        });
      }

      document.getElementById("results").innerHTML = html;
    });
}
