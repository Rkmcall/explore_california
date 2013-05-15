<?php
/*
Template Name: Special Events
*/
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta charset="UTF-8">
<title>Explore California - Special Events</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_directory'); ?>/style.css">
<script src="../../../../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../../../../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
</head>
<body class="home blog">
<div id="wrapper" class="hfeed">
  <div id="header">
    <div id="masthead"> <a href="http://localhost/explore_ca/index.htm"><img src="images/logo.gif" width="192" height="237" alt="Explore California Home"></a></div>
    <!-- #masthead --> 
  </div>
  <!-- #header -->
  
  <div id="main">
    <div id="container">
      <div id="content" role="main">
        <div id="templateID" class="specialEvents" >
          <h1>Special Events</h1>
        </div>
        <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } else { ?>
						<h1 class="entry-title"><?php the_title(); ?></h1>
					<?php } ?>

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
					</div><!-- .entry-content -->
				</div><!-- #post-## -->

				<?php comments_template( '', true ); ?>

<?php endwhile; ?>

<h2><form action="" method="get">
  <fieldset>
    <legend>Keep Informed</legend>
    <p><span id="sprytextfield1">
      <label for="nameField">Name: </label>
      <input type="text" name="nameField" id="nameField">
      <span class="textfieldRequiredMsg">A value is required.</span></span></p>
    <p><span id="sprytextfield2">
    <label for="emailField">Email: </label>
    <input type="text" name="emailField" id="emailField">
    <span class="textfieldRequiredMsg">A value is required.</span><span class="textfieldInvalidFormatMsg">Please enter a valid email address.</span></span></p>
    <p>
      <input type="submit" name="Submit" id="Submit" value="Submit">
    </p>
  </fieldset>
</form></h2>
      </div>
      <!-- #content --> 
    </div>
    <!-- #container -->
    
    <div id="primary" class="widget-area" role="complementary">
      <ul id="baseNav">
        <li><a href="http://www.explorecalifornia.org/tours.htm" title="Explore our tours" class="tours">Tours</a></li>
        <li><a href="http://www.exlorecalifornia.org/mission.htm" title="What we think" class="mission">Mission</a></li>
        <li><a href="http://www.explorecalifornia.org/contact.htm" title="Contact and support" class="contact">Contact</a></li>
        <li><a href="http://www.explorecalifornia.org/resources.htm" title="Guidance and planning" class="resources">Resources</a></li>
        <li><a href="http://www.explorecalifornia.org/explorers.htm" title="Join our community" class="explorers current">Explorers</a></li>
      </ul>
      <!--<ul class="xoxo">

<li id="search-2" class="widget-container widget_search"><form role="search" method="get" id="searchform" action="http://localhost/explore_ca/">
	<div><label class="screen-reader-text" for="s">Search for:</label>
	<input type="text" value="" name="s" id="s">
	<input type="submit" id="searchsubmit" value="Search">
	</div>
	</form></li>		<li id="recent-posts-2" class="widget-container widget_recent_entries">		<h3 class="widget-title">Recent Posts</h3>		<ul>
				<li><a href="http://localhost/explore_ca/?p=4" title="Mountain Biking Rules">Mountain Biking Rules</a></li>
				<li><a href="http://localhost/explore_ca/?p=1" title="Hello world!">Hello world!</a></li>
				</ul>
		</li><li id="archives-2" class="widget-container widget_archive"><h3 class="widget-title">Archives</h3>		<select name="archive-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;"> <option value="">Select Month</option> 	<option value="http://localhost/explore_ca/?m=201008"> August 2010 </option>
 </select>
</li><li id="categories-2" class="widget-container widget_categories"><h3 class="widget-title">Categories</h3>		<ul>
	<li class="cat-item cat-item-1"><a href="http://localhost/explore_ca/?cat=1" title="View all posts filed under Uncategorized">Uncategorized</a>
</li>
		</ul>
</li>			</ul>--> 
    </div>
    <!-- #primary .widget-area --> 
    
  </div>
  <!-- #main -->
  
  <div id="footer" role="contentinfo">
<div id="footerContent">
    <div id="footerMenu">
  <h3>Quick Nav</h3>
    <ul id="quickNav">
      <li><a href="../tours.htm" title="Explore our tours">Tours</a></li>
      <li><a href="../mission.htm" title="What we think">Mission</a></li>
      <li><a href="../contact.htm" title="Contact and support">Contact</a></li>
      <li><a href="../resources.htm" title="Guidance and planning">Resources</a></li>

      <li><a href="../explorers.htm" title="Join our community">Explorers</a></li>
    </ul>
</div>
  <div id="footerBody">
  <div id="footerMidCol">
      <h3><a href="../resources/faq.htm">FAQ</a></h3>
      <p>Find out more about our tours</p>
      <h3><a href="../contact/support.htm">Support</a></h3>

      <p>Need help? It's just a click away!</p>
      <h3><a href="../resources/legal.htm">Legal Disclaimer</a></h3>
    </div>
    <div id="footerRightCol">
      <h1>Explore California</h1>
      <p>5605 Nota Street<br />
        Ventura, CA 93003</p>

      <p class="phone">866.555.4310</p>
    </div>
    </div>
</div>
	<p class="support clearBoth">Explore California &copy; 2010 All Rights Reserved
		

	</p>
</div>
  <!-- #footer --> 
  
</div>
<!-- #wrapper -->

<script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1", "none", {validateOn:["blur"]});
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2", "email", {validateOn:["blur"]});
</script>
</body>
</html>