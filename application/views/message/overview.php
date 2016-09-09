<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-9-3
 * Time: 下午10:59
 */
?>

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/header.php' ?>

<div class="col-md-8 blog-about">

    <div class="panel panel-default">

        <!--/Comment-Content-->
        <div class="panel-heading">
            Comments
        </div>

        <div class="panel-body">

            <div class="comment-walden">
                <?php if ($num_blog_comments == 0): ?>
                    <div class="comment-content text-center">
                        &nbsp;
                        <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;No one has replied currently...
                        <br>
                        &nbsp;
                        <br>
                    </div>
                    <hr>
                <?php else: ?>
                    <?php foreach ($comment as $comment_entry): ?>
                        <div class="comment-userinfo">
                            <img src="/logo/default-visitor.png" class="img-circle" alt="Default Visitor Logo" width="38">
                            &nbsp;&nbsp;<a href="mailto: <?php echo $comment_entry->email; ?>"><span><?php echo $comment_entry->nickname; ?> </span></a>
                            <span class="pull-right text-right-comment view-walden"><i>Reply Time:</i> <?php echo $comment_entry->time; ?></span>
                        </div>
                        <br>
                        <div class="comment-content content-width-walden">
                            <?php echo $comment_entry->content; ?>
                        </div>
                        <!--                        <div>-->
                        <!--                            <a href="#" title="reply" class="pull-right reply-walden">Reply:&nbsp;&nbsp;<i class="fa fa-reply"></i></a>-->

                        <!--                    My Reply is here...-->
                        <!--                            <textarea name="reply_content" class="summernote comment-walden my-reply-walden" id="content" title="content"></textarea>-->
                        <!--                        </div>-->

                        <hr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <nav class="page-walden specify-walden">
                <?php echo $pagination; ?>
            </nav><!--/page division-->
            <hr>


            <div class="comment-walden">
                <!--/Adding-Comment-Content-->

                <?php echo validation_errors(); ?>
                <?php echo form_open('/'.$nav_title.'/comment', array('class' => 'form-submit-walden')); ?>
                <div class="row">
                    <div class="col-sm-9">
                        <div class="input-group username-walden">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-user fa-fw"></i></span>
                            <input id="nickname" name="nickname" type="text" class="form-control" placeholder="Please input your nickname here..." aria-describedby="sizing-addon2">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon" id="sizing-addon2"><i class="fa fa-envelope-o fa-fw"></i></span>
                            <input id="email" name="email" type="text" class="form-control" placeholder="Leave your email for further contact... (Optional)" aria-describedby="sizing-addon2">
                        </div>
                    </div>
                </div>
                <br>
                <textarea name="content" class="summernote comment-walden" id="content" title="content"></textarea>
                <div class="submit-walden">
                    <a href="<?php echo '/'.$nav_title; ?>" class="submit-link-walden"><button id="submit-button" class="btn btn-primary">Submit</button></a>
                </div>
                </form>
            </div>
            <hr>
        </div>
        <!--/Comment-Content-->
    </div>


</div><!--/col-8-->

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/footer.php' ?>
