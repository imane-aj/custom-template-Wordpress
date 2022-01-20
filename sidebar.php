<div class='sidebar'>
    <div lcass='widget'>
        <h3 class='title-sidebar'>
            latest 5 Posts
        </h3>
        <div class='widget-content'>
            <ul>
                <?php
                    $args = array( 'numberposts' => '5' );
                    $recent_posts = wp_get_recent_posts( $args );
                    foreach( $recent_posts as $recent ){
                        printf( '<li><a href="%1$s">%2$s</a></li>',
                            esc_url( get_permalink( $recent['ID'] ) ),
                            apply_filters( 'the_title', $recent['post_title'], $recent['ID'] )
                        );
                    } wp_reset_postdata();
                ?>
            </ul>
        </div>
    </div>
</div>


<div class='sidebar'>
    <div lcass='widget'>
        <h3 class='title-sidebar'>
            Categories
        </h3>
        <div class='widget-content'>
            <div class='sidebar-cat'>
                <?php $categories = get_the_category();
                      $separator = ' ';
                      $output = '';
                      if ( ! empty( $categories ) ) {
                          foreach( $categories as $category ) {
                              $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
                          }
                          echo trim( $output, $separator );
                }?>
            </div>
        </div>
    </div>
</div>


<div class='sidebar'>
    <div lcass='widget'>
        <h3 class='title-sidebar'>
            Hot Post
        </h3>
        <div class='widget-content'>
            <ul>
                <?php
                      $hotPost_arg=array(
                      'posts_per_page'  => 1,
                      'orderby'         => 'comment_count'
                      );
                      $query = new WP_Query($hotPost_arg);
                      if($query->have_posts()){
                      while($query->have_posts()){
                      $query->the_post();
                    ?>
                <li>
                    <a target='_blank' href='<?php echo the_permalink(); ?>'>
                        <?php the_title(); ?>
                        <hr>
                        <?php comments_popup_link('0 Comment', 'One Comment', '% Comments', 'comment-url', 'Comments Off'); ?>
                </li>
                <?php
                    }wp_reset_postdata();
                    }
                  ?>
            </ul>
        </div>
    </div>
</div>