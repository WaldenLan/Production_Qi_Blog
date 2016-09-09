<?php
/**
 * Created by PhpStorm.
 * User: walden
 * Date: 16-8-27
 * Time: 下午6:46
 */
?>

<h2><?php echo $title; ?></h2>

<?php foreach ($news as $news_item): ?>

    <h3><?php echo $news_item['title']; ?></h3>
    <div class="main">
        <?php echo $news_item['text']; ?>
    </div>
    <p>
        <a href="<?php echo site_url('news/'.$news_item['slug']); ?>">
            View article
        </a>
    </p>

<?php endforeach; ?>