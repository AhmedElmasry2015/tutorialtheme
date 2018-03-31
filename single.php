<?php get_header();?>
    <div class="container">
    
    <?php 
if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); ?>
            <div class="post">
                <span class="post-title">
                <a href="<?php the_permalink();?>" ><?php the_title()?></a>
                </span>
                
                <span class="post-author">
                <i class="fa fa-address-card"></i> <?php the_author(); ?>
                </span>

                <span class="post-time">
                <i class="fa fa-calendar"></i><?php the_time(' F jS, Y') ?>
                </span>

                <span class="post-comment">
                <i class="fa fa-comments"></i><?php comments_number(); ?>
                </span>
                <?php the_post_thumbnail();?>

                <span class="post-content">
                    
                <?php the_content(); ?>
                </span>
              
                <span class="post-category">
                <i class="fa fa-list"></i><?php echo get_the_category_list(','); ?>
               </span>
               <br>
               <span class="post-tag">
                    <?php
                    if(has_tag())
                    the_tags();
                    else{
                    echo 'No Tag';
                    }
                    ?> 
                
                </span>
        </div>
<?php	//
	} // end while
} // end if
    ?>
    
    <h4>
        written by
<?php 
$avatr_args=array(
    'class' => 'img-responsive img-thunbial rounded border'
);
 echo get_avatar( get_the_author_meta( 'ID' ),45,'','',$avatr_args );
?>
        <?php the_author_meta('first_name'); ?>
        <?php the_author_meta('last_name'); ?>
        (<?php the_author_meta('user_nicename'); ?>)     
    </h4>
    <?php
    if(get_the_author_meta()){
        ?>
        <p>
        <?php the_author_meta('description'); ?>
        </p>
        <?php
    }
    else{
        echo 'no desc for the user';
    }
    ?>
    Number Of Posts :  <?php echo count_user_posts( get_the_author_meta( 'ID' ) ); ?>
    User Profile Link: <?php the_author_posts_link();?>

    <?php comments_template(); ?> 
    </div>
    
    <?php
        echo '<div class="post-pagi">';
        if(get_previous_post_link()){
            previous_post_link();
        }    
        else{
            echo 'No Prev Link';
        }
            
        if(get_next_post_link()){
            next_post_link();
        }    
        else{
            echo 'No Next Link';
        }
        echo '</div>';
            ?>   
    

<?php get_footer();?>