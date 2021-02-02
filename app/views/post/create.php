<?php 
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navbar.php';
?>
    <div class="main">
        <div class="register cPost">
            <form action="<?= URLROOT ?>/Posts/create" method="POST" enctype="multipart/form-data">
                    <img src="https://www.w3schools.com/w3css/img_avatar4.png" alt="">
                    <h4>Create Post</h4>

                <label for="username">Title</label> <br>
                <input type="text" 
                        id ="username"  
                        name="title" ><br>

                <label for="content">Content</label> <br>
                <textarea name="content" id="content" cols="30" rows="10"></textarea> <br>
                        
                <input type="file" name ="img[]" class="" id="exampleInputFile" multiple> <br>
                        
                        
                <input type="submit" name="addPost" value="Share"> <br>
            </form>
        </div>
    </div>

<?php
   require APPROOT . '/views/includes/footer.php';
?>