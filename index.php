<?php get_header();?>
    <div class="container">
    <div class="row">
    <?php 
if ( have_posts() ) {
	while ( have_posts() ) {
        the_post(); ?>
               
            <div class="col-md-6 post">
                <span class="post-title">
                <a href="<?php the_permalink();?>" ><?php the_title()?></a>
                </span>
                <br>
                <span class="post-author">
                <i class="fa fa-address-card"></i> <?php the_author(); ?>
                </span>

                <span class="post-time">
                <i class="fa fa-calendar"></i><?php the_time(' F jS, Y') ?>
                </span>

                <span class="post-comment">
                <i class="fa fa-comments"></i><?php comments_number(); ?>
                </span>

                <span class="post-img">
                <?php the_post_thumbnail();?>
                </span>

                <span class="post-content">    
                <?php the_excerpt(); ?>
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

         
    </div>
    </div>

    <?php
        echo '<div class="post-pagi">';
        if(get_previous_posts_link()){
            previous_posts_link("<i class='fa fa-chevron-left fa-lg'></i> Prev");
        }    
        else{
            echo 'No Prev Link';
        }
            
        if(get_next_posts_link()){
            next_posts_link("Next <i class='fa fa-chevron-right fa-lg'></i>");
        }    
        else{
            echo 'No Next Link';
        }
        echo '</div>';
            ?>    

<?php get_footer();?>