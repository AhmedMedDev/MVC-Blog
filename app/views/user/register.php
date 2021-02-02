<?php
   require APPROOT . '/views/includes/header.php';
?>

<div class="main">
    <div class="register">
        <form action="<?= URLROOT ?>/Users/register" method="POST" enctype="multipart/form-data">
            <h4>Register Form</h4>

            <label for="username">username</label> <br>
            <input type="text" 
                    id ="username" 
                    placeholder="Enter UserName" 
                    name="username" ><br>
                    
            <label for="email">Email</label> <br>
            <input type="text" 
                    id ="email" 
                    placeholder="Enter Email" 
                    name="email" ><br>
                    
            <label for="password">password</label> <br>
            <input type="password" 
                    id ="password" 
                    placeholder="Enter password" 
                    name="password" > <br>
                    
            <input type="file" name ="img" class="" id="exampleInputFile" > <br>
                    
            <input type="submit" name="register"> <br>
            <a href="<?= URLROOT ?>/Users/login" class="button">Login</a>
        </form>
    </div>
</div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>