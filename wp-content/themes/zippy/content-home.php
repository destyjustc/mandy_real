<?php
 	/*	
	*	The Template for displaying custom home page.
	*   @package WordPress
	*/


?>

<div class="title"><?php echo zippy_options_array('homepage_short_description');?></div>
<div class="border-top"></div>

<div class="box">
<div class="home-content">
	<div class="left-column">
		<div class="profile-image">
			<img src="http://mandy.real.com/wp-content/uploads/2015/01/mandy-busn.jpg">
		</div>
		<?php
			$lang = $_GET['lang'];
			$out = "";
			$out.='<div class="profile-address">';
			$out.='<div>3107 Kingsway</div>';
			$out.='<div>Vancouver,BC</div>';
			$out.='<div>V5R 5J9</div>';
			$out.='</div>';
			print $out;
		?>
	</div>
	<div class="right-column">
		<div class="content">
			<?php
				$out = "";
				if ($lang!='en'){
					$out.='<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in quam at lacus volutpat consequat. Nulla magna diam, fermentum ut hendrerit vitae, sagittis quis augue. Integer ut varius sapien. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent ac ornare diam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>';
					$out.='<p>In maximus, ligula a tempor sodales, lectus lacus convallis sapien, sed aliquet dui enim non tortor. Mauris id nibh finibus, congue erat nec, rutrum justo. Maecenas blandit ipsum enim, vel suscipit mauris maximus vehicula. Proin pulvinar erat sit amet nisl tincidunt, nec sodales magna imperdiet. Phasellus venenatis ipsum quis tincidunt imperdiet. Praesent commodo tincidunt vestibulum. Sed vel interdum mi, vel mollis lorem. Integer elit lacus, scelerisque nec libero et, pulvinar mattis ipsum.</p>';
				}else{

				}
				print $out;
			?>
		</div>
	</div>
</div>


<div class="clear"></div>
</div>
<div class="border-top"></div>
