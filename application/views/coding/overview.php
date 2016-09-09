<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-30
 * Time: 下午7:19
 */
?>

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/header.php' ?>

<div class="col-md-8 blog-about">

    <div class="panel panel-default">

        <div class="panel-heading">
            <ol class="breadcrumb bread-walden">
                <li><a href="/"><i class="icon-home"></i>&nbsp;Home</a></li>
                <li class="active"><?php echo $nav_title; ?></li>
            </ol>
        </div>

        <div class="panel-body panel-walden">
            <!--/Coding-Content-->
            <?php if ($nav_topic_count == 0): ?>
                <div class="row">
                    <br><br>
                    <div class="col-md-10 col-sm-9 text-center">
                        No article about <?php echo ucfirst($nav_title) ; ?> has been written recently...
                    </div>
                </div>
                <br><br>
                <hr class="hr-walden">

            <?php else: ?>

                <?php foreach ($coding as $coding_entry): ?>

                    <?php if ($coding_entry->topic == $nav_title): ?>

                        <?php if (strpos($coding_entry->content, '<img') == FALSE): ?>
                            <div class="row entry-walden">
<!--                                <div class="col-md-9 col-sm-12">  <!--Copy Case-->
                                <div class="col-md-11 col-sm-12">

                                    <h3 class="title-width-walden">
                                        <a class="cat">
                                            <?php echo $coding_entry->tag; ?>
                                            <i></i>
                                        </a>
                                        <?php echo $coding_entry->title; ?>
                                    </h3>

                                    <p class="content-width-walden">
                                        <?php
                                        $content = strip_tags(str_replace('</p>', '&nbsp;&nbsp;', str_replace('<br>', '&nbsp;', $coding_entry->content)));
                                        $content_length = mb_strlen($content);
                                        echo $content_length > 250 ? mb_substr($content, 0, 250).'...' : mb_substr($content, 0, $content_length);
                                        ?>
                                    </p>
                                    <a href="<?php echo site_url($coding_entry->topic.'/view/'.$coding_entry->id); ?>"><button class="btn btn-default">Read More</button></a>
                                    <br><br><br>
                                    <p class="pull-right">
                                        <span class="label label-default"><?php echo ucfirst($coding_entry->topic); ?></span>
                                        <span class="label label-default"><?php echo ucfirst($coding_entry->tag); ?></span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="view-walden"><?php echo $coding_entry->time; ?></li>
                                        <li class="view-walden"><i class="icon-eye-open"></i> (<?php echo $coding_entry->view; ?>)</li>
                                        <li><a href="<?php echo site_url($coding_entry->topic.'/view/'.$coding_entry->id.'/#comment'); ?>"><i class="glyphicon glyphicon-comment"></i> <?php echo $coding_entry->num_comment; ?> Comments</a></li>
                                        <li class="favor-walden" title="favor"><i class="fa fa-heart-o"></i> <?php echo $coding_entry->favor; ?></li>
                                    </ul>
                                </div>
<!--                                <div class="col-md-3 col-sm-3 text-center figure-walden">-->
<!---->
<!--                                </div>-->
                            </div>

                            <hr class="hr-walden">

                        <?php else: ?>
                            <div class="row entry-walden">
                                <div class="col-md-9 col-sm-12">
                                    <h3 class="title-width-walden">
                                        <a class="cat">
                                            <?php echo $coding_entry->tag; ?>
                                            <i></i>
                                        </a>
                                        <?php echo $coding_entry->title; ?>
                                    </h3>
                                    <p class="content-width-walden">
                                        <?php
                                        $content = strip_tags(str_replace('</p>', '&nbsp;&nbsp;', str_replace('<br>', '&nbsp;', $coding_entry->content)));
                                        $content_length = mb_strlen($content);
                                        echo $content_length > 250 ? mb_substr($content, 0, 250).'...' : mb_substr($content, 0, $content_length);
                                        ?>
                                    </p>
                                    <a href="<?php echo site_url($coding_entry->topic.'/view/'.$coding_entry->id); ?>"><button class="btn btn-default">Read More</button></a>
                                    <br><br><br>
                                    <p class="pull-right">
                                        <span class="label label-default"><?php echo ucfirst($coding_entry->topic); ?></span>
                                        <span class="label label-default"><?php echo ucfirst($coding_entry->tag); ?></span>
                                    </p>
                                    <ul class="list-inline">
                                        <li class="view-walden"><?php echo $coding_entry->time; ?></li>
                                        <li class="view-walden"><i class="icon-eye-open"></i> (<?php echo $coding_entry->view; ?>)</li>
                                        <li><a href="<?php echo site_url($coding_entry->topic.'/view/'.$coding_entry->id.'/#comment'); ?>"><i class="glyphicon glyphicon-comment"></i> <?php echo $coding_entry->num_comment; ?> Comments</a></li>
                                        <li class="favor-walden" title="favor"><i class="fa fa-heart-o"></i> <?php echo $coding_entry->favor; ?></li>
                                    </ul>
                                </div>
                                <div class="col-md-3 col-sm-3 text-center figure-walden">
                                    <a class="story-img" href="<?php echo site_url($coding_entry->topic.'/view/'.$coding_entry->id); ?>">
                                        <?php
                                        $img_pos = strpos($coding_entry->content, '<img');
                                        $img_close_pos = strpos($coding_entry->content, '>', $img_pos);
                                        $img_length = $img_close_pos - $img_pos + 1;
                                        $img_tag = mb_substr($coding_entry->content, $img_pos, $img_length);
                                        $pos_g = strpos($img_tag, 'g');
                                        $img_md = mb_substr($img_tag, 0, $pos_g + 1)." class='img-rounded img-circle-walden' ".mb_substr($img_tag, $pos_g + 1, $img_length - $pos_g);
                                        echo $img_md;
                                        ?>
                                    </a>
                                </div>
                            </div>

                            <hr class="hr-walden">

                        <?php endif; ?>

                    <?php endif; ?>

                <?php endforeach;?>

            <?php endif; ?>

            <!--/Coding-Content-->

            <nav class="page-walden specify-walden">
                <?php echo $pagination; ?>
            </nav><!--/page division-->

        </div>
    </div>



</div><!--/col-8-->

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/footer.php' ?>

