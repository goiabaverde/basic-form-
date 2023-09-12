<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Basic form</title>
</head>
<body>
    <main>
        
        <div class="form">
            <h1>Form</h1>
            <form action="index.php" method='POST'>
                <div class="single_input_area">
                    <input required autocomplete='off' placeholder='Type your username here' class='input_text'  type="text" id="name" name="name" class='input_text' >
                    <label class='input_text_label'for="name" >Username</label>
                </div>
                
                <div class="single_input_area">
                    <input required autocomplete='off' placeholder='Type your email here' type="text" id="email" name="email" class='input_text'>
                    <label class='input_text_label' for="email">Email</label>
                </div>
                
                <div class="single_input_area">
                    <input required autocomplete='off' placeholder='Type your passoword here'  type="password" name="pwd" id="pwd" class='input_text'>
                    <label class='input_text_label' for="pwd">Password</label>
                </div>
                

                <div class="gender_inputs_area">
                    <input required  type="radio" value="male" name="gender" id="male">
                    <label class='gender_label' for="male">Male</label>
                    
                    <input required type="radio" value="female" name="gender" id="female">
                    <label class='gender_label' for="female">Femele</label>
                    
                    <input required type="radio" value="no binary" name="gender" id="no_bi">
                    <label class='gender_label' for="no_bi">No binary</label>
                </div>

                <div class="dob_input_area">
                    <label for="dob">Date of birth</label>
                    <input  required type="date" name="dob" id="dob_input">
                </div>
                <div class="submit_input_area">
                    <input type="submit" id="submit_btn" name = 'submit' value = 'Submit'>
                </div>
                <div class='message'>
                </div>
            </form>
        </div>
    </main>
</body>
</html>

<?php
if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

//hashing the password
    $hash_pwd= password_hash($pwd, PASSWORD_DEFAULT); 
    
    include_once('config.php');
    $check_username = mysqli_query($connection,"select * from users where username ='$name'");
    $check_email = mysqli_query($connection, "select * from users where email ='$email'");
    $count_username = mysqli_num_rows($check_username);
    $count_email = mysqli_num_rows($check_email);
    
    if($name == NULL | $email == NULL | $pwd == NULL | $gender == NULL | $dob == NULL ){
        echo "<p class='error'>Some field is empty, please fill it.</p>";
        exit(1);
    }
//check if the user and email are valid 
    if($count_email == 0 & $count_username == 0) {
        $result = mysqli_query($connection,"INSERT INTO users(username, email ,pwd, gender, dob) VALUES('$name', '$email', '$hash_pwd', '$gender', '$dob')");
        echo "<p class='sucess'>Your data has been submited with sucess!</p>";  
    }
    else{
        echo"rodo isso";
        echo "<p class='error'>Username or email was already used, try another one.</p>";
    }  
}
?>

