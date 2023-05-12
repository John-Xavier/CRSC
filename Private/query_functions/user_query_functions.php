<?php
// User table functions
function insert_user($user) {
  global $db;

  $errors = validate_user($user);
  if(!empty($errors)) {
    return $errors;
  }

  $sql = "INSERT INTO user ";
  $sql .= "(`Id`, `full_name`, `age`, `role`, `phone`, `email`, `password`) ";
  $sql .= "VALUES (";
  $sql .= "'0',";
  $sql .= "'" . db_escape($db, $user['full_name']) . "',";
  $sql .= "'" . db_escape($db, $user['age']) . "',";
  $sql .= "'" . db_escape($db, $user['role']) . "',";
  $sql .= "'" . db_escape($db, $user['phone']) . "',";
  $sql .= "'" . db_escape($db, $user['email']) . "',";
  $sql .= "'" . db_escape($db, $user['password']) . "'";
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
function validate_user($user) {
  $errors = [];

  if(is_blank($user['full_name'])) {
    $errors[] = "Name cannot be blank.";
  } elseif(!has_length($user['full_name'], ['min' => 2, 'max' => 255])) {
    $errors[] = "Name must be between 2 and 255 characters.";
  }
  if(is_blank($user['age'])) {
    $errors[] = "age cannot be blank.";
  }
  if(is_blank($user['email'])) {
    $errors[] = "email cannot be blank.";
  }
  return $errors;
}
function find_all_users() {
  global $db;

  $sql = "SELECT * FROM user ";
  $sql .= "ORDER BY Id ASC";
 // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_user_by_id($id) {
  global $db;

  $sql = "SELECT * FROM user ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  // echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  $user = mysqli_fetch_assoc($result);
  mysqli_free_result($result);
  return $user;
}
function delete_user($id) {
  global $db;

  $sql = "DELETE FROM user ";
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
function update_user($user) {
    global $db;

    $errors = validate_user($user);
    if(!empty($errors)) {
      return $errors;
    }
  
    $sql = "UPDATE user SET ";
    $sql .= "Id='" . db_escape($db, $user['Id']) . "', ";
    $sql .= "user_name='" . db_escape($db, $user['user_name']) . "', ";
    $sql .= "email='" . db_escape($db, $user['email']) . "', ";
    $sql .= "age='" . db_escape($db, $user['age']) . "' ";
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
  function user_login($credentials){
    global $db;
    $sql = "SELECT * FROM user WHERE ";
     $sql .= "email='" . db_escape($db, $credentials['email']) . "' ";
     $sql .= "AND password='" . db_escape($db, $credentials['password']) . "'";
     $result = mysqli_query($db, $sql);

     confirm_result_set($result);
     $user = mysqli_fetch_assoc($result);
     
     return $user;
     if($result) {
      if(mysqli_num_rows($result) == 1){

        return $user;
        
    } else {
        $error = "Invalid username or password";
    }
    mysqli_free_result($result);
    } else {
      echo mysqli_error($db);
      db_disconnect($db);
      exit;
    }

  }
?>