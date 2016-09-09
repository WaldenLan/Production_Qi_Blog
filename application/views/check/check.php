<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-31
 * Time: 下午5:03
 */
?>

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/header.php' ?>

<div class="col-md-8 blog-about">

    <div class="panel panel-default">

        <div class="panel-heading">
            <ol class="breadcrumb bread-walden">
                <li><a href="/"><i class="icon-home"></i>&nbsp;Home</a></li>
                <li><a href="<?php echo site_url('/'.$coding['topic']) ?>"><?php echo $coding['topic']; ?></a></li>
                <li class="active"><?php echo $coding['tag']; ?></li>
            </ol>
        </div>
        <div class="panel-body panel-walden">
            <!--/Coding-Content-->
            <div class="row">
                <div class="col-md-12 col-sm-11">
                    <div class="text-center">
                        <h2 class="content-width-walden"><?php echo $coding['title']; ?></h2>
                        <h5 class="entry-tag">
                            <span class="label label-default"><?php echo ucfirst($coding['topic']); ?></span>
                            <span class="label label-default"><?php echo ucfirst($coding['tag']); ?></span>
                        </h5>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-xs-12">
                            <p class="entry-content-walden content-width-walden"><?php echo $coding['content']; ?></p>
                            <br><br><br>
                            <ul class="list-inline pull-right">
                                <li class="view-walden"><i>Last Edit:</i> <?php echo $coding['time']; ?></li>
                                <li class="view-walden"><i class="icon-eye-open"></i>
                                    (<?php echo $coding['view'] ?>)
                                </li>
                                <li><a href="#comment"><i class="glyphicon glyphicon-comment"></i>&nbsp;<?php echo $coding['num_comment']; ?> Comments</a></li>
                                <li class="favor-walden favor-ajax" title="favor"><i class="fa fa-heart-o"></i> <?php echo $coding['favor']; ?></li>

<!--                                <form style="display: none" id="favor" name="favor"></form>-->

<!--                            Favor Port-->

                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <hr id="comment">
            <!--/Coding-Content-->

        </div>
    </div>

    <div class="panel panel-default">

        <!--/Comment-Content-->
        <div class="panel-heading">
            Comments
        </div>

        <div class="panel-body">

            <div class="comment-walden">
                <?php if ($coding['num_comment'] == 0): ?>
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


            <div class="comment-walden">
                <!--/Adding-Comment-Content-->

                <?php echo validation_errors(); ?>
                <?php echo form_open('/'.$coding['topic'].'/comment/'.$coding['id'], array('class' => 'form-submit-walden')); ?>
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
                        <a href="#" class="submit-link-walden"><button id="submit-button" class="btn btn-primary">Submit</button></a>
                    </div>
                </form>
            </div>
            <hr>
        </div>
        <!--/Comment-Content-->
    </div>



</div><!--/col-8-->

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/footer.php' ?>

