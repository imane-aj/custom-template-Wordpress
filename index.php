<?php get_header(); ?>
<div class='container'>
    <div class='head'>
        <!--<div class='row'>-->
        <div class='text'>
            <p><span>That's too much. I think I'm going to fail..! </span> 6 months ago, while learning basic HTML.
                Today,
                I’m
                learning PHP and WORDPRESS👩🏼‍💻 Sometimes, we focus too much on all that we “don’t know,” instead
                of all
                that
                we’ve learned. 🧠 I encourage you to “celebrate the small wins” everyday, and give yourself credit
                for all
                that
                you’ve learned, regardless of how far into your learning journey you are! 🎉 </p>
            <button class='btn'>Discover Our Site</button>

        </div>
        <div class='image'>
            <img class='img-index'
                src='<?php echo get_template_directory_uri()."/imgs/webdesign-dpc86654229-1200x608.jpg"; ?>'>
        </div>
    </div>
</div>
</div>
<div class='container home-page'>
    <div class='row'>
        <div class='col-md-8'>
            <?php
        if(have_posts()){
       while(have_posts()){
         the_post(); ?>
            <div class='main-post'>

                <?php the_post_thumbnail('',['class'=>'img-thumbnail','title'=>'post image']); ?>


                <h3 class='post-title'>
                    <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                </h3>
                <span class='post-auther'><i class="fa fa-user fa-fw"></i>
                    <?php the_author_posts_link(); ?>,
                </span>
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
                    <p class='posr-tags'>
                        <?php
                  if(has_tag()){
                  the_tags();
                  }else{
                   echo "Tags: There's no tags"; 
                  }
               ?>
                    </p>

            </div>
            <?php }}?>
            <?php echo '<div class="clearfix"></div>';
   echo '<div class="post-pagination">';
   if(get_previous_posts_link()){
   previous_posts_link("<i class='fa fa-chevron-left' aria-hidden='true'></i> Prev");
   }else{
   echo '<span>No previous Page</span>';
   }
  if(get_next_posts_link()){
  next_posts_link("Next <i class='fa fa-chevron-right' aria-hidden='true'></i>");
  }else{
  echo '<span>No Next Page</span>';
  }
  echo'</div>'; 
?>
        </div>
        <div class='col-md-4'>
            <div class='bar'>
                <?php get_sidebar(); ?>
            </div>
            <div>
                <?php get_search_form(); ?>
            </div>
        </div>

    </div>
</div>
</div>


<?php get_footer(); ?>