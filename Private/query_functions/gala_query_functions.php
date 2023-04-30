<?php
 function insert_gala($gala) {
    global $db;

    $errors = validate_gala($gala);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "INSERT INTO galas ";
    $sql .= "(gala_name, date) ";
    $sql .= "VALUES (";
    $sql .= "'" . db_escape($db, $gala['gala_name']) . "',";
    $sql .= "'" . db_escape($db, $gala['date']) . "'";
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
  function validate_gala($gala) {
    $errors = [];

    // gala_name
    if(is_blank($gala['gala_name'])) {
      $errors[] = "Name cannot be blank.";
    } elseif(!has_length($gala['gala_name'], ['min' => 2, 'max' => 255])) {
      $errors[] = "Name must be between 2 and 255 characters.";
    }
    if(is_blank($gala['date'])) {
      $errors[] = "Date cannot be blank.";
    }
    return $errors;
  }
  function find_all_galas() {
    global $db;

    $sql = "SELECT * FROM galas ";
    $sql .= "ORDER BY Id ASC";
    echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  function find_gala_by_id($id) {
    global $db;

    $sql = "SELECT * FROM galas ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "'";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    $gala = mysqli_fetch_assoc($result);
    mysqli_free_result($result);
    return $gala;
  }
  function delete_gala($id) {
    global $db;

    $sql = "DELETE FROM galas ";
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
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
  function update_gala($gala) {
    global $db;

    $errors = validate_gala($gala);
    if(!empty($errors)) {
      return $errors;
    }

    $sql = "UPDATE galas SET ";
    $sql .= "Id='" . db_escape($db, $gala['Id']) . "', ";
    $sql .= "gala_name='" . db_escape($db, $gala['gala_name']) . "', ";
    $sql .= "date='" . db_escape($db, $gala['date']) . "', ";
    $sql .= "WHERE Id='" . db_escape($db, $gala['Id']) . "' ";
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