<?php
if ( post_password_required() ) {
	return;
}
if(comments_open()){
  ?>
<h3 class='comment-count'><?php comments_number('0 Comment','1 Comment','% Comments'); ?></h3>
<?php
echo '<ul class="list-unstyled comments-list">';
$comments_arg = array(
'max_depth'         => 3,
'type'              =>'comment', 
'reverse_top_level' => true,
'avatar_size'       => '60',

 );
wp_list_comments($comments_arg);
echo '</ul>';
echo '<hr class="comment-separator">';
$commentform_arg = array(
'fields'           => array(
'author'           => '<div class="form-group"><input class="form-control" placeholder="Type You Name..."></div>',
'email'            => '<div class="form-group"><input class="form-control" placeholder="Type Your Email..."></div>',
'url'              => '<div class="form-group"><input class="form-control" placeholder="Type Your Url..."></div>'
),
'comment_field'    => '<div class="mb-3">
  
  <textarea class="form-control" rows="3" placeholder="Write a Comment..."></textarea>
</div>',
'title_reply'      => 'Add Comment',
'comment_notes_before' => '',
'class_submit' => 'btn btn-primary btn-md',
'title_reply_to' => 'Add a Reply To [%s]'
 );
comment_form($commentform_arg);
}else{
 echo 'Comments are off';
}
?>