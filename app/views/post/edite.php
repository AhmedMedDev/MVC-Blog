<?php 
    require APPROOT . '/views/includes/header.php';
    require APPROOT . '/views/includes/navbar.php';

    //echo'<pre>';print_r($data);die;
?>
    <div class="main">
        <div class="register cPost">
            <form action="" method="POST" enctype="multipart/form-data">
                    <img src="https://www.w3schools.com/w3css/img_avatar4.png" alt="">
                    <h4>Edite Post</h4>

                <label for="username">Title</label> <br>
                <input type="text" 
                        id ="username"  
                        name="title" 
                        value="<?= $data['post']['title']?>"><br>

                <label for="content">Content</label> <br>
                <textarea name="content" 
                          id="content" 
                          cols="30" rows="10" ><?= $data['post']['content']?></textarea> <br>
                        
                <input type="file" 
                        name ="img[]" 
                        id="exampleInputFile"
                        multiple> <br>
                        
                        
                <input type="submit" name="editePost" value="Share"> <br>
            </form>
        </div>
    </div>
<div class="imgs" style="position: absolute;
        top: 50%;
        left: 23%;">
<?php foreach($data['postImg'] as $postImg):?>
<a href="<?= URLROOT . "/Posts/deleteImg/" . $postImg['imgID']?> ">
    <img src="<?= URLROOT ?>/public/img/upload/<?= $postImg['img'] ?>" style="width:100px" >
</a>
<?php endforeach;?>
</div>
<?php
   require APPROOT . '/views/includes/footer.php';
?>