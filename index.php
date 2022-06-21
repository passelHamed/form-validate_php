<?php


$name = $mail = $website = $comment = $gender = "";
$nameErr = $mailErr = $websiteErr = $commentErr = $genderErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty($_POST["fname"])){
        $nameErr = "name is required";
    }else {
        $name = $_POST['fname'];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            $nameErr = "Only letters and white space allowed";
        }
    }


    if(empty($_POST["mail"])){
        $mailErr = "mail is required";
    }else {
        $mail = text_data($_POST["mail"]);
        if (!filter_var($mail , FILTER_VALIDATE_EMAIL)){
            $mailErr = "your mail is wrong";
        }
    };

    if(empty($_POST["website"])){
        $websiteErr = "";
    }else {
        $website = text_data($_POST["website"]);
        if (!filter_var($website , FILTER_VALIDATE_URL)){
            $websiteErr = "Invalid URL";
        }
    };

    if(empty($_POST["comment"])){
        $commentErr = "";
    }else {
        $comment = text_data($_POST["comment"]);
    };

    if(empty($_POST["gender"])){
        $genderErr = "gender is required";
    }else {
        $gender = text_data($_POST["gender"]);
    };

}

function text_data($data){
    $data = trim($data);
    return $data;
};


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1 php</title>
    <style>
            .error{
                color: #ff0000;
            }
    </style>
</head>
<body>
    
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST">
        <table>
            <tr>
                <td>
                    <input type="text" placeholder="Write your name" name="fname" value="<?php echo $name ?>">
                    <span class="error">* <?php echo $nameErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="email" name="mail" placeholder="Write your mail" value="<?php echo $mail ?>">
                    <span class="error">* <?php echo $mailErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="text" name="website" placeholder="Write your website" value="<?php echo $website ?>">
                    <span class="error"> <?php echo $websiteErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <textarea name="comment" placeholder="Write your comment" cols="40" rows="5"><?php echo $comment; ?></textarea>
                    <span class="error"> <?php echo $commentErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    male<input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender == "male"){ echo "checked";}; ?>>
                    female<input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender == "female"){ echo "checked";}; ?>>
                    <span class="error">* <?php echo $genderErr;?></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="submit">
                </td>
            </tr>
        </table>
    </form>

</body>
</html>

<?php

echo $name . "<br>";
echo $mail . "<br>";
echo $website . "<br>";
echo $comment . "<br>";
echo $gender . "<br>";

?>