<?php
// User table functions
function insert_results($gala_result) {
  global $db;

  $errors = validate_result($gala_result);
  if(!empty($errors)) {
    return $errors;
  }

  $sql = "INSERT INTO gala_results ";
  $sql .= "(`gala_id`, `user_id`, `position`, `stroke`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $gala_result['gala_id']) . "',";
  $sql .= "'" . db_escape($db, $gala_result['user_id']) . "',";
  $sql .= "'" . db_escape($db, $gala_result['position']) . "',";
  $sql .= "'" . db_escape($db, $gala_result['stroke']) . "'";
  $sql .= ")";
  $result = mysqli_query($db, $sql);
  // For INSERT statements, $result is true/false
  if($result) {
    return true;
  } else {
    // INSERT failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
function validate_result($gala_result) {
  $errors = [];

  if(is_blank($gala_result['gala_id'])) {
    $errors[] = "Gala Id cannot be blank.";
  }
  if(is_blank($gala_result['user_id'])) {
    $errors[] = "User id cannot be blank.";
  }
  if(is_blank($gala_result['position'])) {
    $errors[] = "Position cannot be blank.";
  }
  if(is_blank($gala_result['stroke'])) {
    $errors[] = "Stroke cannot be blank.";
  }
  return $errors;
}
function find_all_results() {
  global $db;

  $sql = "SELECT * FROM gala_results ";
  $sql .= "ORDER BY Id ASC";
  echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_results_by_id($id) {
  global $db;

  $sql = "SELECT * FROM gala_results ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $user;
}
function delete_results($id) {
  global $db;

  $sql = "DELETE FROM gala_results ";
  $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
  $result = mysqli_query($db, $sql);

  if($result) {
    return true;
  } else {
    // DELETE failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;
  }
}
function update_results($gala_results) {
    global $db;

    $errors = validate_user($gala_results);
    if(!empty($errors)) {
      return $errors;
    }
    $sql = "UPDATE gala_results SET ";
    $sql .= "Id='" . db_escape($db, $user['Id']) . "', ";
    $sql .= "gala_id='" . db_escape($db, $user['gala_id']) . "', ";
    $sql .= "user_id='" . db_escape($db, $user['user_id']) . "', ";
    $sql .= "position='" . db_escape($db, $user['position']) . "' ";
    $sql .= "stroke='" . db_escape($db, $user['stroke']) . "' ";
    $sql .= "WHERE Id='" . db_escape($db, $user['role']) . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($db, $sql);
    // For UPDATE statements, $result is true/false
    if($result) {
      return true;
    } else {
      // UPDATE failed
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }
?>