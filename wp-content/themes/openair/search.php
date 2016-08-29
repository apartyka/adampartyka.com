  <?php 
    global $openair_options; 
  ?>
  
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

        <?php } else { ?>
        <div class="post">
          <div class="post-top"></div>
          <div class="post-content">
			<div class="post-title">
			  <h2>No search results!</h2>
            </div>
              
            <div class="post-main">
              <p>
                Unluckily for you, your search has yielded no results. Perhaps you can find something
                by browsing the blog's archives?
              </p>
              
              <ul>
                <?php get_archives('monthly', '10', 'html', '', '', FALSE); ?>
             </ul>
           </div>
          </div>
          <div class="post-bottom"></div>
        </div>
        <?php } ?> 
	    <div class="spacer">&nbsp;</div>
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