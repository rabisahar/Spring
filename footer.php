<?php 
?>	
	</div>
	<div class="clear"> </div>	
<footer>
		<div class="footer">
			<p style="color: white; text-align: center; margin-bottom: 0;">Springfield Junior School</p>
			<br>
		 <div id="footer-content">
			<?php 
			$options  = get_option('spring_options');
			 echo $options['footer_content']; 
		 ?>
			</div>
		</div>
</footer>
 
	<?php wp_footer(); ?>
</body> 
 
</html>
 

