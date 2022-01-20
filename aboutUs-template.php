<?php
/**
* Template Name: about us
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Im@ne 1.0
*/ get_header(); 
?>
<div class='container'>
    <div class='row justify-content-center about-us'>
        <?php
        if(have_posts()){
        while(have_posts()){
        the_post(); ?>

        <div class='col-md-5'>
            <?php the_post_thumbnail('',['class'=>'img-thumbnail','title'=>'post image']); ?>
        </div>

        <div class='col-md-7'>
            <div class='post'>
                <h1 class='post-title text-center'>
                    <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                </h1>
                <?php edit_post_link('<i class="fas fa-pencil-alt"></i> Edit'); ?>

                <div class='post-content'>
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>
</div>
<?php get_footer(); ?>