<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-30
 * Time: 下午4:05
 */
?>

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/header.php' ?>

<div class="col-md-8 blog-about">

    <div class="panel panel-default">

        <div class="panel-heading">
            <span class="title-walden">About the Site</span>
        </div>

        <div class="panel-body">

            <!--/About-Content-->
            <div class="row">
                <br>
                <div class="col-md-12 col-sm-11">
                    <img src="/logo/qrcode.jpg" alt="QR code of Qi Lian" width="120">
                    <p>
                        <br>
                        This site is Qi Lian's personal blog, which mainly covers three parts: <a href="#" target="_self">Coding</a>,
                        <a href="#" target="_self">Geek</a>, and <a href="#" target="_self">Life</a>. The whole site is built by my own. Its back-end is based on
                        the PHP MVC framework --- <a href="http://www.codeigniter.com/" target="_blank">CodeIgniter 3.1.0</a>, and its front-end UI's are based on the
                        front-end framework <a href="http://www.bootcss.com/" target="_blank">Bootstrap 3</a> and one of its templates ---
                        <a href="https://www.bootstrapzero.com/bootstrap-template/blog">starter-template</a>. In addition, the database of this site is
                        <a href="https://www.mysql.com/">MySQL</a>. For the server of this site, I use the <a href="https://www.aliyun.com/">Aliyun</a> CentOS, and the
                        <a href="http://www.waldenlian.com">domain name</a> of this site is bought from <a href="https://wanwang.aliyun.com/">Aliyun Civilink</a>.
                    </p>
                    <hr>

                    <h4>Contact Info:</h4>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-2">
                            E-mail:
                            <br>
                            Homepage:
                        </div>
                        <div class="col-md-6">
                            <a href="mailto: waldenlian@gmail.com">waldenlian@gmail.com</a>
                            <br>
                            <a href="http://waldenlan.github.io" target="_blank">waldenlan.github.io</a>
                        </div>
                    </div>
                    <hr>

                    <h4>Copyright Notice:</h4>
                    <br>
                    <p>
                        Welcome to share the articles of this site. The copyrights of the articles on this site <span class="blog-notice">belong to the authors</span>.
                        <br>
                        <span class="blog-notice">Specify</span> the sources of the original articles when sharing is needed. Please respect others' works.
                        <br>
                        If the articles on this site have any copyright related problems, welcome to <span class="blog-notice">contact</span> me.
                    </p>

                </div>
            </div>
            <hr>


            <!--/About-Content-->



        </div>
    </div>



</div><!--/col-8-->

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/footer.php' ?>
