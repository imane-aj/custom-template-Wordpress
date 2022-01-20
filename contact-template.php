<?php
/**
* Template Name: contact us
*
* @package WordPress
* @subpackage Twenty_Fourteen
* @since Twenty Fourteen 1.0
*/ get_header(); 
?>
<div class='container contact'>
    <div class='row justify-content-center'>
        <?php
        if(have_posts()){
        while(have_posts()){
        the_post(); ?>
        <div class="col-auto">
            <div class='post'>
                <?php edit_post_link('<i class="fas fa-pencil-alt"></i> Edit'); ?>
                <h3 class='post-title text-center'>
                    <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                </h3>
                <div class='post-content'>
                    <?php the_content() ?>
                </div>
            </div>
        </div>
        <?php }} ?>
    </div>
</div>
<?php get_footer(); ?>