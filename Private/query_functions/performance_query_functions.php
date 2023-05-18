<?php
// User table functions
function insert_performance($performance) {
  global $db;

  $errors = validate_performance($performance);
  if(!empty($errors)) {
    echo 'error from query func';
    return $errors;
  }

  $sql = "INSERT INTO performance ";
  $sql .= "(`user_id`, `backstroke`, `breaststroke`, `butterfly`, `sidestroke`, `week`) ";
  $sql .= "VALUES (";
  $sql .= "'" . db_escape($db, $performance['user_id']) . "',";
  $sql .= "'" . db_escape($db, $performance['backstroke']) . "',";
  $sql .= "'" . db_escape($db, $performance['breaststroke']) . "',";
  $sql .= "'" . db_escape($db, $performance['butterfly']) . "',";
  $sql .= "'" . db_escape($db, $performance['sidestroke']) . "',";
  $sql .= "'" . db_escape($db, $performance['week']) . "'";
  $sql .= ")";
  echo $sql;
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
function validate_performance($performance) {
  $errors = [];

  if(is_blank($performance['user_id'])) {
    $errors[] = "user_id cannot be blank.";
  }
  if(is_blank($performance['backstroke'])) {
    $errors[] = "backstroke cannot be blank.";
  }
  if(is_blank($performance['breaststroke'])) {
    $errors[] = "breaststroke cannot be blank.";
  }
  if(is_blank($performance['butterfly'])) {
    $errors[] = "butterfly cannot be blank.";
  }
  if(is_blank($performance['week'])) {
    $errors[] = "week cannot be blank.";
  }
  return $errors;
}
function find_all_performance() {
  global $db;

  $sql = "SELECT * FROM performance ";
  $sql .= "ORDER BY Id ASC";
  echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_performance_by_id($id) {
  global $db;
//SELECT performance.*,user.full_name FROM performance,user WHERE performance.user_id = user.Id;
  $sql = "SELECT performance.*,user.full_name FROM performance,user ";
  $sql .= "WHERE performance.Id='" . db_escape($db, $id) . "'";
   echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $user;
}
function find_performance_by_user_id_and_week($id,$week) {
  global $db;
//SELECT performance.*,user.full_name FROM performance,user WHERE performance.user_id = user.Id;
  $sql = "SELECT performance.*,user.full_name FROM performance,user ";
  $sql .= "WHERE performance.user_id='" . db_escape($db, $id) . "'AND performance.week='" . db_escape($db, $week) . "'";
   echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $user;
}
function find_performance_by_week($week) {
  global $db;
//SELECT performance.*,user.full_name FROM performance,user WHERE performance.user_id = user.Id;
  $sql = "SELECT performance.*,user.full_name FROM performance,user ";
  $sql .= "WHERE performance.week='" . db_escape($db, $week). "'AND performance.user_id=user.Id";
   echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function delete_performance($id) {
  global $db;

 
  $sql = "DELETE FROM performance ";
  $sql .= "WHERE Id='" . db_escape($db, $id) . "' ";
  $sql .= "LIMIT 1";
 
  echo $sql;
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
function delete_performance_with_user($id) {
  global $db;

 
  $sql = "DELETE FROM performance ";
  $sql .= "WHERE user_id='" . db_escape($db, $id) . "'";

 
  echo $sql;
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
function update_performance($performance) {
    global $db;

    $errors = validate_performance($performance);
    if(!empty($errors)) {
      return $errors;
    }
    $sql = "UPDATE performance SET ";
    $sql .= "user_id='" . db_escape($db, $performance['user_id']) . "', ";
    $sql .= "backstroke='" . db_escape($db, $performance['backstroke']) . "', ";
    $sql .= "breaststroke='" . db_escape($db, $performance['breaststroke']) . "', ";
    $sql .= "butterfly='" . db_escape($db, $performance['butterfly']) . "', ";
    $sql .= "sidestroke='" . db_escape($db, $performance['sidestroke']) . "', ";
    $sql .= "week='" . db_escape($db, $performance['week']) . "' ";
    $sql .= "WHERE Id='" . db_escape($db, $performance['Id']) . "' ";
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