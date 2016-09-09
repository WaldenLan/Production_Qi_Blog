<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-24
 * Time: 下午10:18
 */
?>

<div class="col-md-4 sidebar-walden">
    <div class="panel">
        <div class="sidebar">
            <div id="avatar">
                <img src="/img/avatar.jpg" class="img-circle" alt="Avatar of Qi Lian" width="220">
            </div>
            <div class="sidebar-profile">
                <h2>Walden Lian</h2>
                <h4 class="saying">Back to my own...</h4>
                <hr />
                <div class="row profile">
                    <p class="col-sm-3"></p>
                    <p class="col-sm-1">
                        <i class="icon-user-md"></i> <br/>
                        <i class="icon-envelope"></i> <br/>
                        <i class="icon-link"></i>
                    </p>
                    <p class="col-sm-6">
                        <span class="pull-left">ECE@SJTU</span> <br />
                        <span class="pull-left"><a href="mailto:walden.lian@gmail.com">walden.lian@gmail.com</a></span> <br />
                        <span class="pull-left"><a href="http://waldenlan.github.io" target="_blank">waldenlan.github.io</a></span>
                    </p>
                </div>
                <hr />

                <ul class="list-inline">
                    <li><a class="link link-linkedin" href="https://cn.linkedin.com/in/qi-lian-74b216b1" target="_blank"><i class="icon-linkedin-sign icon-2x"></i></a></li>
                    <li><a class="link link-github" href="https://github.com/WaldenLan" target="_blank"><i class="icon-github icon-2x"></i></a></li>
                    <li><a class="link link-facebook" href="#"><i class="icon-facebook-sign icon-2x"></i></a></li>
                    <li><a class="link link-twitter" href="#"><i class="icon-twitter icon-2x"></i></a></li>
                    <li><a class="link link-google" href="#"><i class="icon-google-plus-sign icon-2x"></i></a></li>
                </ul>
            </div>
        </div>

    </div>

</div><!--/col-4-->

<div class="col-md-4 sidebar-walden">
    <div class="panel panel-default">
        <div class="panel-heading"><span><i class="icon-cloud sidebar-tag"></i>&nbsp;&nbsp;Cloud Tag</span></div>
        <div class="panel-body">
            <div class="sidebar-profile cloud-tag row">
                <div class="col-md-1"></div>
                <div class="col-md-10 cloud-tag">
                    <?php foreach ($tags as $tag): ?>
                        <span class="pull-left"><?php echo $tag->tag; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
                    <?php endforeach;?>
                </div>
                <div class="col-md-1"></div>
            </div>
        </div>
    </div>
</div><!--/col-4-->

<!--<div class="col-md-4">-->
<!--    <div class="panel panel-default">-->
<!--        <div class="panel-heading panel-walden"><span><i class="icon-tags sidebar-tag"></i>&nbsp;&nbsp;Latest</span></div>-->
<!--        <div class="panel-body">Panel Content</div>-->
<!--    </div>-->
<!--</div><!--/col-4-->

<div class="col-md-4 sidebar-walden">
    <div class="panel panel-default">
        <div class="panel-heading"><span><i class="icon-comments-alt sidebar-tag"></i>&nbsp;&nbsp;Latest Comments</span></div>
        <div class="panel-body">
            <?php foreach ($entry_comment as $comment): ?>
                <div class="comment-userinfo-brief">
                    <a href="mailto: <?php echo $comment->email; ?>"><span class="comment-nickname-brief"><?php echo ucfirst($comment->nickname); ?> </span></a>
                    &nbsp;says:
                </div>
                <div class="comment-content content-width-walden">
                    <?php
                    $content = strip_tags(str_replace('</p>', '&nbsp;&nbsp;', str_replace('<br>', '&nbsp;', $comment->content)));
                    $content_length = mb_strlen($content);
                    echo $content_length > 90 ? mb_substr($content, 0, 90).'...' : mb_substr($content, 0, $content_length);
                    ?>
                </div>

                <hr class="hr-walden hr-walden-v2">
            <?php endforeach; ?>
        </div>
    </div>
</div><!--/col-4-->





</div>
</div>

<hr>


<button class="btn btn-default btn-lg" id="to-top" type="button"><i class="icon-double-angle-up"></i></button>


<footer class="footer-walden">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <ul class="list-inline">
                    <li><a class="logo logo-linkedin" href="https://cn.linkedin.com/in/qi-lian-74b216b1" target="_blank"><i class="icon-linkedin-sign icon-2x"></i></a></li>
                    <li><a class="logo logo-github" href="https://github.com/WaldenLan" target="_blank"><i class="icon-github icon-2x"></i></a></li>
                    <li><a class="logo logo-facebook" href="#"><i class="icon-facebook-sign icon-2x"></i></a></li>
                    <li><a class="logo logo-twitter" href="#"><i class="icon-twitter icon-2x"></i></a></li>
                    <li><a class="logo logo-google" href="#"><i class="icon-google-plus-sign icon-2x"></i></a></li>
                </ul>
                <div class="cnzz">
                    <!-- include the CNZZ evaluation tool-->
                    <script type="text/javascript">
                        var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
                        document.write(unescape("%3Cspan id='cnzz_stat_icon_1260306396'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1260306396%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));
                    </script>
                </div>
            </div>
            <div class="col-sm-6">
                <p class="pull-right">Copyright &copy; 2016-<span id="current-year"></span>, Qi Lian | Built with <i class="icon-heart-empty"></i> at <a class="logo" href="http://www.bootply.com">Bootply</a> | 沪ICP备16035099号</p>
                <p class="pull-right">Last Update: <span id="update-time"></span></p>
            </div>
        </div>
    </div>
</footer><!--footer-->

<!-- script references -->
<script src="/js/jquery-2.0.2.min.js"></script>
<script src="/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

<!-- include summernote js-->
<script src="/summernote-master/dist/summernote.js"></script>
<!--<script src="/silviomoreto-bootstrap-select-a8ed49e/js/bootstrap-select.js"></script>-->
<script src="/js/main.js"></script>
</body>
</html>