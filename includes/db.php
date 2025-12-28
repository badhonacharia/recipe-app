<?php
$conn = new mysqli("localhost", "root", "", "recipe_app");

if ($conn->connect_error) {
    die("DB connection failed");
}

$conn->set_charset("utf8mb4");

/* ===== CACHE FUNCTIONS ===== */

function getCache($conn, $key) {
    $stmt = $conn->prepare(
        "SELECT response_json 
         FROM recipe_cache 
         WHERE cache_key=? AND expires_at > NOW()"
    );
    $stmt->bind_param("s", $key);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function setCache($conn, $key, $json, $ttl = 3600) {
    $stmt = $conn->prepare(
        "REPLACE INTO recipe_cache 
        (cache_key, response_json, expires_at)
        VALUES (?, ?, DATE_ADD(NOW(), INTERVAL ? SECOND))"
    );
    $stmt->bind_param("ssi", $key, $json, $ttl);
    $stmt->execute();
}
