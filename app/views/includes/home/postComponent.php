                <?php $j = 1; ?>
                <?php foreach($data['posts'] as  $post): ?>
                <div class="w3-container w3-card w3-white w3-round w3-margin"><br>
                    <img src="<?= URLROOT ?>/public/img/upload/userImg/<?= $post['img'] ?>" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px;height:60px">
                    <span class="w3-right w3-opacity">1 min</span>
                  
                    <h4><?= $post['username'] ?></h4><br>
                    
                    <hr class="w3-clear">
                    <p><?= $post['content'] ?></p>
                      <div class="w3-row-padding" style="margin:0 -16px">
                        <div id="<?= 'demo'. $j ?>" class="carousel slide" data-ride="carousel">
                          <!-- The slideshow -->
                          <div class="carousel-inner ">
                          <?php $i = 1; ?>
                            <?php foreach($data['imgs'] as  $postImg): ?>
                              <?php if($post['id'] === $postImg['postID'] && !empty($postImg['img'])): ?>
                                <div class="carousel-item <?php echo $active = ($i == 1) ?  'active'  :  '' ;  ?>">
                                  <img src="<?= URLROOT ?>/public/img/upload/<?= $postImg['img'] ?>" style="width:100%"  class="w3-margin-bottom" alt="Thser is no pic">
                                </div>
                              <?php $i++; ?>
                            <?php endif; ?>
                          <?php endforeach; ?>
                          </div>
                          <?php if($i > 2): ?>
                            <!-- Left and right controls -->
                            <a class="carousel-control-prev" href="<?= '#demo'. $j ?>" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="<?= '#demo'. $j ?>" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                          <?php endif; ?>
                          </div>
                        </div>

                        <?php if($post['userID'] === $data['user']['id'] ): ?>

                            <a href="<?= URLROOT . '/posts/edite/' . $post['id'] ?>">
                            <button type="button" class="btn btn-primary w3-right edite">Edite</button>
                            </a>

                            <a href="<?= URLROOT . '/posts/delete/' . $post['id'] ?>">
                            <button type="button" class="btn btn-danger w3-right delete">Delete</button>
                            </a>

                        <?php endif; ?>

                        <?php $notExist = true;?>
                        <?php $count = count($data['getLikesPost'][$post['id']]); ?>
                    
                        <?php foreach($data['getLikesPost'][$post['id']] as  $getLikesPost): ?>
                            <?php if( in_array($data['user']['id'],$getLikesPost) ): ?>
                            <a href="<?= URLROOT . '/posts/Dislike/' . $data['user']['id']  . '/' . $post['id'] ?>" class="like">
                                <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> UNlike  <?= $count;?> </button> 
                            </a>
                            <?php $notExist = false;  break; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>

                        <?php if( $notExist || empty($data['getLikesPost'][$post['id']]) ): ?>
                            <a href="<?= URLROOT . '/posts/like/' . $data['user']['id']  . '/' . $post['id'] ?>" class="like">
                            <button type="button" class="w3-button w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Like  <?= $count;?></button> 
                            </a>
                        <?php endif; ?>

                        <a href="#" class="comment">
                            <button type="button" class="w3-button w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i>  Comment</button> 
                        </a>
                </div>
                  <?php $j++ ; ?>
                <?php endforeach; ?>