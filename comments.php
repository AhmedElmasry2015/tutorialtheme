<?php
if(comments_open()){
    echo '<div class="list-unstyled comment-list">';
    ?>
       <h3 class="comments-count"><?php comments_number();?></h3>
       <?php
    wp_list_comments(array(
        'max_depth' => 4,
        'type' => 'comment' ,
        'avatar_size' => 50 ,
        'reverse_top_level' => true
    ));
   //s echo'comments open';
    echo '</div>';
}

else{
    echo 'disabled';
}
?>

<?php
$comments_args = array(
        // change the title of send button 
        'label_submit'=>'Send',
        // change the title of the reply section
        'title_reply'=>'Write a Reply or Comment',
        // remove "Text or HTML to be displayed after the set of comment fields"
        'comment_notes_after' => '');
        
comment_form( $comments_args); ?>