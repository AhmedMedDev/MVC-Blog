<?php
   require APPROOT . '/views/includes/header.php';
?>

<div class="main">
    <div class="register">
        <form action="<?= URLROOT ?>/users/login" method="POST">
                <img src="https://www.w3schools.com/w3css/img_avatar4.png" alt="">
                <h4>Login Form</h4>

            <label for="username">username</label> <br>
            <input type="text" 
                    id ="username" 
                    placeholder="Enter UserName" 
                    name="username" ><br>
                    
            <label for="password">password</label> <br>
            <input type="password" 
                    id ="password" 
                    placeholder="Enter password" 
                    name="password" > <br>
                    
            <input type="submit" name="login"> <br>
            <a href="<?= URLROOT ?>/Users/register" class="button">Register</a>
        </form>
    </div>
</div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>