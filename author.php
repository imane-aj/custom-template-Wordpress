<?php get_header(); ?>
<div class='container'>
    <div class='row author-p'>
        <div class='author-imgP'>

            <?php $avatar_arg=array(
           'class' => 'img-responsive img-thumbnail text-center'
                );
             echo get_avatar(get_the_author_meta('ID'), 150, '', 'User Avatar', $avatar_arg );
         ?>

        </div>
        <h4 class='justify-content-end'>
            <?php the_author_meta('first_name'); ?>
            <?php the_author_meta('last_name'); ?>
        </h4>
        <p>
            <?php if(get_the_author_meta('description')){ 
           the_author_meta('description');
           } ?>
        </p>
    </div>
    <div class='row authorInf'>
        <div class='col-sm-6 col-md-3'>
            <div class='stats'>
                <p>Posts Count</p><span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
            </div>
        </div>
        <div class='col-sm-6 col-md-3'>
            <div class='stats'>
                <p>Comments Count</p> <span>
                    <?php $commentsCount= array(
            'user_id'  => get_the_author_meta('ID'),
             'count'    => true
            );
           echo get_comments($commentsCount); ?>
                </span>
            </div>
        </div>
        <div class='col-sm-6 col-md-3'>
            <div class='stats'>
                <p>Total Posts View</p> <span>0</span>
            </div>
        </div>
        <div class='col-sm-6 col-md-3'>
            <div class='stats'>
                <p>Testing</p> <span>0</span>
            </div>
        </div>
    </div>
    <div class='row'>
        <?php
        $authorPost_arg = array(
        'author'          => get_the_author_meta('ID'),
         'posts_per_page'  => -1
       );
        $author_posts = new WP_Query($authorPost_arg);

        if($author_posts->have_posts()){
       while($author_posts->have_posts()){
         $author_posts->the_post(); ?>
        <div class='col-md-4'>
            <div class='author-post'>

                <?php the_post_thumbnail('',['class'=>'img-thumbnail','title'=>'post image']); ?>


                <h3 class='post-title'>
                    <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                </h3>
                <spna class='post-date'><i class="far fa-calendar-alt fa-fw"></i>
                    <?php the_time('F j Y'); ?>,
                    </span>
                    <span class='post-comments'><i class='far fa-comments fa-fw'></i>
                        <?php comments_popup_link('0 Comment', 'One Comment', '% Comments', 'comment-url', 'Comments Off'); ?>
                    </span>
                    <div class='post-content'>
                        <?php the_excerpt() ?>
                        <a href='<?php echo get_permalink(); ?>'>Read More...</a>
                    </div>
                    <hr>
                    <p class='post-categories'>
                        <i class='fa fa-tags fa-fw'></i>
                        <?php the_category(', '); ?>
                    </p>
            </div>
        </div>
        <?php }} wp_reset_postdata(); ?>

    </div>
    <div class='row comments-part'>
        <?php
               $comments_per_page = 6;
             $comments_arg=array(
            'user_id'     =>get_the_author_meta('ID'),
            'status'      =>'approve',
             'number'      => $comments_per_page,
             'post_status' =>'publish',
             'post_type'   =>'post'
             );
           $comments=get_comments($comments_arg);
         if($comments){?>
        <h3 class='author-comments'>
            <?php if(get_comments($commentsCount)>=$comments_per_page){
           echo 'Latest' .$comments_per_page. 'Comments Of' ; the_author_meta('nickname') ;
          }else{
           echo 'Latest Comments Of ' ;the_author_meta('nickname');
       } ?>
        </h3>

        <?php foreach($comments  as $comment){?>

        <div class='col-md-4'>
            <div class='author-comnts'>
                <div class='author-imgP'>

                    <?php $avatar_arg=array(
           'class' => 'img-responsive img-thumbnail text-center'
                );
             echo get_avatar(get_the_author_meta('ID'), 100, '', 'User Avatar', $avatar_arg );
         ?>

                </div>
                <div class='post-contenu'>
                    <h3 class='post-title'>
                        <a href='<?php echo get_permalink($comment->comment_post_ID); ?>'>
                            <?php echo get_the_title($comment->comment_post_ID); ?>
                        </a>
                    </h3>
                    <span class='post-date'><i
                            class="far fa-calendar-alt fa-fw"></i><?php echo 'Added On '. mysql2date( 'l,F j,Y', $comment->comment_date );  ?>
                    </span>
                    <div class='post-content'>
                        <?php echo $comment->comment_content ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    }
    ?>
    </div>
</div>
</div>
<?php get_footer(); ?>