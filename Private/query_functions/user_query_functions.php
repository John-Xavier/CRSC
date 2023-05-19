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
  }else{
    if(!is_numeric($user['age'])){
      $errors[] = "Invalid Age";
    }
   
  }
  if(is_blank($user['phone'])) {
    $errors[] = "age cannot be blank.";
  }else{
    if(!validate_phone($user['phone'])){
      $errors[] = "Phone number is invalid";
    }
  }
  if(is_blank($user['email'])) {
    $errors[] = "email cannot be blank.";
  }else{
    $email = $user['email'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $errors[] = "Invalid email format";
}
  }
  return $errors;
}
function validate_phone($number){
  if(preg_match('/^[0-9]{10}+$/', $number)) {
    return true;
    } else {
    return false;
    }
}
function find_all_users() {
  global $db;

  $sql = "SELECT * FROM user ";
  $sql .= "ORDER BY Id ASC";
 // ////echo $sql;
  $result = mysqli_query($db, $sql);
  confirm_result_set($result);
  return $result;
}
function find_user_by_id($id) {
  global $db;

  $sql = "SELECT * FROM user ";
  $sql .= "WHERE id='" . db_escape($db, $id) . "'";
  // ////echo $sql;
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
    $sql .= "full_name='" . db_escape($db, $user['full_name']) . "', ";
    $sql .= "email='" . db_escape($db, $user['email']) . "', ";
    $sql .= "phone='" . db_escape($db, $user['phone']) . "', ";
    $sql .= "password='" . db_escape($db, $user['password']) . "', ";
    $sql .= "age='" . db_escape($db, $user['age']) . "', ";
    if(isset($user['role'])){
      $sql .= "role='" . db_escape($db, $user['role']) . "' ";
    }
    $sql .= "WHERE Id='" . db_escape($db, $user['Id']) . "' ";
    $sql .= "LIMIT 1";
////echo $sql;
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
  function validate_login($credentials){
    $errors = [];
    if(is_blank($credentials['password'])) {
      $errors[] = "age cannot be blank.";
    }
    if(is_blank($credentials['email'])) {
      $errors[] = "email cannot be blank.";
    }else{
      $email = $credentials['email'];
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
  }
    }
    return $errors;
  }
  function user_login($credentials){
    global $db;
    $errors = validate_login($credentials);
    if(!empty($errors)) {
      return $errors;
    }
    $sql = "SELECT * FROM user WHERE ";
     $sql .= "email='" . db_escape($db, $credentials['email']) . "' ";
     $sql .= "AND password='" . db_escape($db, $credentials['password']) . "'";
     $result = mysqli_query($db, $sql);
////echo $sql;
     confirm_result_set($result);
     $user = mysqli_fetch_assoc($result);
     
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
  function find_all_children($parentid) {
    global $db;
  
    $sql = "SELECT * FROM parent ";
    $sql .= "WHERE parent_id='" . db_escape($db, $parentid) . "' ";
    $sql .= "ORDER BY Id ASC";
   // //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }
  function insert_child($user,$parent_id) {
    global $db;
  
  
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

    if (mysqli_query($db, $sql)) {
      $last_id = mysqli_insert_id($db);

      return insert_parent($last_id,$parent_id);
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      exit;
    }
    
  }
  function insert_parent($user_id,$parent_id) {
    global $db;
  
  
    $sql = "INSERT INTO parent ";
    $sql .= "(`Id`, `parent_id`, `child_id`) ";
    $sql .= "VALUES (";
    $sql .= "'0',";
    $sql .= "'" . db_escape($db, $parent_id) . "',";
    $sql .= "'" . db_escape($db, $user_id) . "'";
    $sql .= ")";
    $result = mysqli_query($db, $sql);
    return $result;
   
  }
  function delete_user_from_parent($id) {
    global $db;
  
   
    $sql = "DELETE FROM parent ";
    $sql .= "WHERE parent_id='" . db_escape($db, $id) . "'OR child_id='" . db_escape($db, $id). "'";
   
    ////echo $sql;
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
  
?>