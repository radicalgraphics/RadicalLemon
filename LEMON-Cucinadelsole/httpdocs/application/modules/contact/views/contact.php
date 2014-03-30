<?php
global $URI, $IN;

if ($IN->cookie('user_lang') == FALSE) {
    $lang = $URI->config->config['language_abbr'];
} else {
    $lang = $IN->cookie('user_lang');
}

if ($lang == "nl") {

    $address = "Ons adres:";
    $maps = "Routebeschrijving:";
    $contact = "Stuur ons een mailtje:";
    $name = "Naam:";
    $email = "E-mail:";
    $mobtel = "Mobiel nummer:";
    $text = "Uw bericht:";
    $send = "Verstuur";
    $message = "Bericht Verzonden!";
} else {

    $address = "Our address:";
    $maps = "Maps:";
    $contact = "Contact us by email:";
    $name = "Name:";
    $email = "E-mail:";
    $mobtel = "Mobile number:";
    $text = "Text:";
    $send = "Send";
    $message = "Sent!";
}
?>

<div class="contact">
	<div class="container contact">
		<div class="left">
			<div class="address">
				<h1><?php echo $address ?></h1>
				<div class="contact-details">
					<div><?php echo $contact_details->address; ?></div>
					<div><?php echo $contact_details->city; ?></div>
					<div><?php echo $contact_details->country; ?></div>
					<div><?php echo $contact_details->telephone; ?></div>
				</div>
			</div>
			<div class="social-icons">
               <?php if ($lang == "nl") :?>
                    <a href="https://www.facebook.com/lacucinadelsole" target="_blank"><img src="<?php echo base_url() . "skin/site/images/fb.png" ?>" alt="right"/></a>
                    <a href="https://twitter.com/LaCucinaDelSole" target="_blank"><img src="<?php echo base_url() . "skin/site/images/tw.png" ?>" alt="right"/></a>
                    <a href="http://cucinadelsole.typepad.com" target="_blank"><img src="<?php echo base_url() . "skin/site/images/blg.png" ?>" alt="right"/></a>
                    <a href="http://cucinadelsole.typepad.com/the_sunny_kitchen" target="_blank"><img src="<?php echo base_url() . "skin/site/images/www.png" ?>" alt="right"/></a>
                    <a href="http://cimedirapa.wordpress.com" target="_blank"><img src="<?php echo base_url() . "skin/site/images/www.png" ?>" alt="right"/></a>
                    <?php else: ?>
                     <a href="https://www.facebook.com/lacucinadelsole" target="_blank"><img src="<?php echo base_url() . "skin/site/images/fb.png" ?>" alt="right"/></a>
                    <a href="https://twitter.com/LaCucinaDelSole" target="_blank"><img src="<?php echo base_url() . "skin/site/images/tw.png" ?>" alt="right"/></a>
                    <a href="http://cucinadelsole.typepad.com/the_sunny_kitchen" target="_blank"><img src="<?php echo base_url() . "skin/site/images/blg.png" ?>" alt="right"/></a>
                    <a href="http://cucinadelsole.typepad.com" target="_blank"><img src="<?php echo base_url() . "skin/site/images/www.png" ?>" alt="right"/></a>
                    <a href="http://cimedirapa.wordpress.com" target="_blank"><img src="<?php echo base_url() . "skin/site/images/www.png" ?>" alt="right"/></a>
                    
                  <?php endif; ?>  
			</div>
			<div class="maps">
				<h1><?php echo $maps ?></h1>
				<div  id="show_map"></div>
			</div>
		</div>
		
		<div class="right">
			<h1><?php echo $contact ?></h1>
			
			<?php $form_id = array ('id' => 'contact_form'); echo form_open('contact/sendMail' , $form_id); ?>
				<div class="field">
							<div>
										<label for="name"><?php echo $name ?></label>
							</div>
							<div>
										<input id="name" type="text" value=""/> 
							</div>			
				</div>
				<div class="field">
							<div>
										<label for="email"><?php echo $email ?></label>
							</div>
							<div>
										<input id="email" type="text" value=""/>
							</div>
				</div>
				<div class="field">
							<div>
										<label for="phone"><?php echo $mobtel ?></label>
							</div>
							<div>
										<input id="phone" type="text" value=""/>
							</div>
				</div>
				<div class="field">
							<div>
										<label for="coment"><?php echo $text ?></label>
							</div>
							<div>
										<textarea name="coment" id="coment" cols=34 rows=6></textarea>
							</div>
				</div>
				
				<button type="button" class="submit"><?php echo $send ?></button>	
			</form>
	<div class="msg"></div>
			
		</div>
		<div class="clearer"></div>
	</div>
</div>
<script type="text/javascript">	
	$(document).ready(function() {
	
		$('#show_map').width("350px").height("200px").gmap3({
				marker:{
						address: "<?php echo $contact_details->address.", ".$contact_details->city;  ?>",
				},
				map: {
						options:{
							zoom: 15
						}	
				},
		});		
		
		$(".submit").click( function () {    
				
					var name = $("#name").val();
					var email = $("#email").val();
					var phone = $("#phone").val();
					var coment = $("#coment").val();
					var ajax ='1';
					var action = $("#contact_form").attr('action');

					var characterReg = /^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$/;
												if(!characterReg.test(email)) {
															$(".msg").addClass('cerror').html('<span>Check all fields again?!</span>');
												}
	
								else {
	
						$.ajax({
									type: "POST",
									url:"<?php echo base_url('consenmail/sendmail');?>",
									data: {"name": name , "email": email , "phone" : phone , "coment" : coment, "ajax" : ajax },
									cache:false,
									success: function(data) {            
														if ( data == 'true') {
																$(".msg").addClass('success').html('<?php echo $message; ?>');
														}	
														else {
																$(".msg").addClass('cerror').html('<span></span>');
														}
									}
						});
																			
						$('#contact_form').each (function(){  
									this.reset();
						}); 											
				}
		});
 });
</script>