<?php
include ('././ad/jembatan.php');
//get search term
$searchTerm = $_GET['term'];
//get matched data from skills table
$query = $db->query("SELECT * FROM obat WHERE obat LIKE '%".$searchTerm."%' ORDER BY obat ASC");
while ($row = $query->fetch_assoc()) {
    $data[] = $row['obat'];
}
//return json data
echo json_encode($data);
?>