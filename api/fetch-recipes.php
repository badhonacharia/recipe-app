<?php
require_once "../includes/db.php";

$q = trim($_GET['q'] ?? '');
$country = trim($_GET['country'] ?? '');

if (strlen($q) > 50) exit;

$cacheKey = md5($q . "_" . $country);

/* ===== 1. CACHE CHECK ===== */
$cached = getCache($conn, $cacheKey);
if ($cached) {
    echo $cached['response_json'];
    exit;
}

/* ===== 2. API URL ===== */
if ($country) {
    $apiUrl = "https://www.themealdb.com/api/json/v1/1/filter.php?a=" . urlencode($country);
} else {
    $apiUrl = "https://www.themealdb.com/api/json/v1/1/search.php?s=" . urlencode($q);
}

/* ===== 3. FETCH API ===== */
$response = @file_get_contents($apiUrl);
$data = json_decode($response, true);

$recipes = [];

if (!empty($data['meals'])) {
    foreach ($data['meals'] as $meal) {
        $recipes[] = [
            "id"    => $meal['idMeal'],
            "name"  => $meal['strMeal'],
            "image" => $meal['strMealThumb']
        ];
    }
}

/* ===== 4. SAVE CACHE ===== */
setCache($conn, $cacheKey, json_encode($recipes), 3600);

/* ===== 5. LOG SEARCH ===== */
$stmt = $conn->prepare(
    "INSERT INTO search_logs (keyword, country, ip_address)
     VALUES (?, ?, ?)"
);
$ip = $_SERVER['REMOTE_ADDR'];
$stmt->bind_param("sss", $q, $country, $ip);
$stmt->execute();

/* ===== 6. UPDATE POPULAR COUNTRY ===== */
if ($country) {
    $stmt = $conn->prepare(
        "INSERT INTO popular_countries (country, search_count)
         VALUES (?,1)
         ON DUPLICATE KEY UPDATE search_count = search_count + 1"
    );
    $stmt->bind_param("s", $country);
    $stmt->execute();
}

/* ===== 7. RETURN DATA ===== */
echo json_encode($recipes);
