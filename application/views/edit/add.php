<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-30
 * Time: 下午11:56
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

        <div class="panel-body">

            <h3>Add New Entry</h3>

            <!--/Adding-Entry-Content-->
            <?php echo validation_errors(); ?>

            <?php echo form_open('/create'); ?>
            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">Title</span>
                <input name="title" type="text" class="form-control" placeholder="Entry Title" aria-describedby="sizing-addon2">
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">Tag&nbsp;</span>
                <input name="tag" type="text" class="form-control" placeholder="Classify as..." aria-describedby="sizing-addon2">
            </div>
            <br>

            <div class="input-group">
                <span class="input-group-addon" id="sizing-addon2">Topic</span>
                <div class="input-walden">
                    <div class="col-sm-1"></div>
                    <input type="radio" name="topic" value="coding" id="coding" aria-describedby="sizing-addon2">
                    <label for="coding" class="topic-walden">&nbsp;Coding&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" name="topic" value="geek" id="geek" aria-describedby="sizing-addon2">
                    <label for="geek" class="topic-walden">&nbsp;Geek&nbsp;&nbsp;&nbsp;</label>
                    <input type="radio" name="topic" value="life" id="life" aria-describedby="sizing-addon2">
                    <label for="life" class="topic-walden">&nbsp;Life&nbsp;&nbsp;&nbsp;</label>
                </div>
            </div>
            <br>

            <textarea name="content" class="summernote" id="content" title="content"></textarea>


            <a href="/create" class="submit-walden"><button id="submit-button" class="btn btn-primary">Submit</button></a>
            </form>
            <hr>


            <!--/Adding-Entry-Content-->



        </div>
    </div>



</div><!--/col-8-->

<?php include dirname(dirname(dirname(__FILE__))) . '/application/views/footer.php' ?>



