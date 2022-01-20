<?php get_header(); 
      include (get_template_directory() . '/inc/breadcrump.php');
?>

<div class='container post-page'>
    <div class='row'>
        <?php
if(have_posts()){
while(have_posts()){
the_post(); ?>
        <div class='col-md-3'>
            <div class='author'>
                <div class='author-img'>

                    <?php $avatar_arg=array(
           'class' => 'img-responsive img-thumbnail text-center'
                );
             echo get_avatar(get_the_author_meta('ID'), 86, '', 'User Avatar', $avatar_arg ); ?>
                </div>
                <div class='author-info'>
                    <h4>
                        <?php the_author_meta('first_name'); ?>
                        <?php the_author_meta('last_name'); ?>
                        <span><?php the_author_meta('nickname'); ?></span>
                    </h4>
                    <?php if(get_the_author_meta('description')){ ?>
                    <p class='author-desc'> <?php the_author_meta('description'); } ?> </p>
                    <div class='author-stats'>
                        <div class="clearfix"></div>
                        <p><span
                                class='post-count'><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>Posts
                            Count
                        </p>
                        <p><span><?php echo the_author_posts_link(); ?></span>User Profil Link </p>
                    </div>
                    <button class='btn btn-block'>Follow</button>

                </div>
            </div>
            <div class='bar'>
                <?php get_sidebar(); ?>
            </div>
        </div>
        <div class='col-md-9'>
            <div class='post'>
                <?php edit_post_link('<i class="fas fa-pencil-alt"></i> Edit'); ?>
                <h3 class='post-title'>
                    <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                </h3>
                <spna class='post-date'><i class="far fa-calendar-alt fa-fw"></i>
                    <?php the_time('F j Y'); ?>,
                    </span>
                    <span class='post-comments'><i class='far fa-comments fa-fw'></i>
                        <?php comments_popup_link('0 Comment', 'One Comment', '% Comments', 'comment-url', 'Comments Off'); ?>
                    </span>
                    <?php the_post_thumbnail('',['class'=>'img-thumbnail','title'=>'post image']); ?>
                    <!--<p>
                        <img src='<?php the_post_thumbnail_url(); ?>' alt='' style='width:..; height:..;'>
                    </p>-->
                    <div class='post-content'>
                        <?php the_content() ?>
                    </div>
                    <hr>
                    <p class='post-categories'>
                        <i class='fa fa-tags fa-fw'></i>
                        <?php the_category(', '); ?>
                    </p>
                    <p class='posr-tags'>
                        <?php
        if(has_tag()){
            the_tags();
         }else{
           echo "Tags: There's no tags"; 
           } ?>
                    </p>
                    <?php
echo '</div>'; }
}

?>
                    <div>
                        <?php
       $randomPost_arg = array(
        'orderby'               => 'rand',
         'posts_per_page'       => 5,
         'category__in'         => wp_get_post_categories(get_queried_object_id()),
          'category__not_in'    =>array(get_the_ID())
        );
        $random_posts = new WP_Query($randomPost_arg);

        if($random_posts->have_posts()){
       while($random_posts->have_posts()){
         $random_posts->the_post(); ?>
                        <div class='author-post'>
                            <h3 class='post-title'>
                                <a href='<?php the_permalink(); ?>'><?php the_title(); 
      ?>
                                </a>
                            </h3>
                        </div>
                        <?php
       }}
echo '<div class="clearfix"></div>';
echo '<div class="post-pagination">';
if(get_previous_post_link()){
previous_post_link("%link", "<i class='fa fa-chevron-left' aria-hidden='true'></i> Prev");
}else{
echo '<span class="no-prev">No previous Page</span>';
}
if(get_next_post_link()){
next_post_link('%link',"Next <i class='fa fa-chevron-right' aria-hidden='true'></i>");
}else{
echo '<span class="no-next">No Next Page</span>';
}
echo'</div>';
echo '<hr class="comment-separator">';
comments_template();
?>
                    </div>
            </div>
        </div>
        <?php get_footer(); ?>