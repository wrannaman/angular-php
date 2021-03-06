<?php
include "connection.php";
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

// Variables
$id = $request->id;
$name=$request->name;
$start= $request->start;
$length = (int)$request->length;
$notes = $request->notes;
$progress = (int)$request->progress;
$owner = (int)$request->owner;
$public = (int)$request->public;
//echo "name: $name, start: $start, length: $length, notes: $notes, progress: $progress, owner: $owner";
// prepare statement
if (!($select = $mysqli->prepare("UPDATE Projects SET name=?, start=?, length=?, progress=?, notes=?, public=? WHERE id=?"))) {
  echo "Uh oh. Prepare statement failed : (" . $select->errno . ") " . $select->error;
}
// bind
if (!$select->bind_param("ssiisii", $name, $start, $length, $progress, $notes,$public, $id)) {
  echo "Uh oh. Bind statement failed : (" . $select->errno . ") " . $select->error;
}
// execute
if (!$select->execute()) {
  if ($select->errno == "1062") {
    echo "dup";
  }
  //echo json_encode("Insertion failed failed : (" . $select->errno . ") " . $select->error . ")");
} else {
  echo json_encode("insert_success");
}

//header('Content-Type: application/json');
//echo json_encode($data);

$select->close();
?>
