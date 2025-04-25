<?php

if (($_SESSION['login_status'] ?? '') == 1) {
	$_page_view['_message'][] = 'Već ste ulogovani';
}

if (($_GET['action'] ?? '') == 'logout') {
	unset($_SESSION['login_status']);
	unset($_SESSION['user_level']);
	redirect(URL_INDEX);
}

if (isset($_POST['submit'])) {

    $username=$_POST["user"];
    $password=$_POST["password"];
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['user']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    

    


  
    // register user if there are no errors in the form
    
        $password = ($password);//encrypt the password before saving in the database
        $query = "INSERT INTO users (username, password) 
                  VALUES('$username', '$password')";
        mysqli_query($db,  $query);

   
     
    

}
$_page_view['page_title'] = 'Register';  
$_page_view['view_filename'] = './template/view-register.php'

?>