<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat </title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
<center><h1>Anonymous  chat</h1></center>


<div class="container" id="scrollContainer">
<?php
    include("database.php");
    $sql = "SELECT text FROM chat;";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0){
       while($row= mysqli_fetch_assoc($result)){
            echo "<div class=\"text\">"."<i class=\"fa-solid fa-circle-user\"></i><pre>".$row["text"]."</pre></div>";
        }
       }
?>
    </div>
    

    <div class="input">
        <form action="index.php" method="post">
            <textarea  name="text" id="text" placeholder="enter something"></textarea>
            <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
        </form>
    </div>

    <script>
    window.onload = function () {
        let container = document.getElementById("scrollContainer");
        container.scrollTo({ top:container.scrollHeight, behavior: "instant" });
      
    };
</script> 
   <?php
  
     if(count($_POST)>0){
        $text=$_POST["text"];
        if($text!=""){
        $sql = "INSERT INTO chat (text) VALUES ('".$text."');";
        mysqli_query($conn,$sql);
        header("Refresh:0");
        }
     }
   ?>

   <script>
        let textInput = document.getElementById("text");
        console.log(textInput.value)
        setTimeout(() => {
            if(document.activeElement!==textInput){
                location.reload(true);
            }
           }, 2000); 


           
        
   </script>

</body>
</html>


