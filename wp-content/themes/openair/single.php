  <?php get_header(); ?>

    <div id="middle">
      <!--
        Sidebar Two
        
        Three columns; column positions set to left, or center;
        //-->
	  <?php if ($openair_options['no_of_columns'] == 'three' && $openair_options['column_pos'] == 'left') { require("sidebar_two.php"); } ?>
      
      
      <!--
        Sidebar One;
        
        Three columns; column position set to left, or center;
        //-->
      <?php if (($openair_options['no_of_columns'] == "three" && $openair_options['column_pos'] != "right") || $openair_options['sidebar_pos'] == 'left') { require("sidebar_one.php"); } ?>
      
      
      <!--
        Content;
        //-->
	  <div id="top_content" class="content">
	  <?php if (have_posts()) {  ?>
		<!--
	      Be sure to keep the id, so we can discount this post later on
		  //-->
		<?php while (have_posts()) : the_post();
		      require("post.php");
		      endwhile; ?>
			  
		<div class="navigation">
		  <div class="align-left"><h3><?php next_posts_link('&laquo; Older Entries'); ?></h3></div>
		  <div class="align-right"><h3><?php previous_posts_link('Newer Entries &raquo;'); ?></h3></div>
		</div>

	    <div class="spacer">&nbsp;</div>
        <?php } ?> <!-- end have_posts() check //-->
	  </div>
	  
      
      <!--
        Sidebar Two;
        
        Three Columns; column position set to right;
        //-->
      <?php if ($openair_options['no_of_columns'] == 'three' && ($openair_options['column_pos'] == 'right' || $openair_options['column_pos'] == 'center')) { require("sidebar_two.php"); } ?>
	  
      
	  <!--
	    Sidebar One;
        
        Three Columns; center position (sidebar either side)
        Two Columns; sidebar position on right
		//-->
	  <?php if (($openair_options['no_of_columns'] == "three" && $openair_options['column_pos'] == "right") || ($openair_options['no_of_columns'] == "two" && $openair_options['sidebar_pos'] == "right")) { require("sidebar_one.php"); } ?>
      
      
	  <div class="spacer">&nbsp;</div>
	</div>
		
    <?php get_footer(); ?>