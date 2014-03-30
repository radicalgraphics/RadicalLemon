<div class="ls-navigation">
	<?php echo Modules::run('navigation/admin_navigation/getAdminNavigation'); ?>
</div>
<div class="new-page-container">
	<div class="sub-container">
		<div class="title">
			<span class="bold">Your account!</span><span>User account details</span>
		</div>
		<div class="top-line"></div>
		<div class="form-content">
			<div class="common-fields">
				<div class="fields">
					<div class="field-text">
						<label for="username">Your name:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->first_name; ?></span>
					</div>			
				</div>
				<div class="fields">
					<div class="field-text">
						<label for="username">Your lastname:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->last_name; ?></span>
					</div>			
				</div>
			</div>	
			<div class="common-fields">
				<div class="fields">
					<div class="field-text">
						<label for="username">Username:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->username; ?></span>
					</div>			
				</div>
				<div class="fields">
					<div class="field-text">
						<label for="username">Password:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->password; ?></span>
					</div>			
				</div>
			</div>	
			<div class="common-fields">
				<div class="fields">
					<div class="field-text">
						<label for="username">Company:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->company; ?></span>
					</div>			
				</div>
				<div class="fields">
					<div class="field-text">
						<label for="username">E-mail:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->email; ?></span>
					</div>			
				</div>
			</div>
			<div class="common-fields">
				<div class="fields">
					<div class="field-text">
						<label for="username">Address:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->address; ?></span>
					</div>			
				</div>
				<div class="fields">
					<div class="field-text">
						<label for="username">City:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->city; ?></span>
					</div>			
				</div>	
			</div>
			<div class="common-fields">
				<div class="fields">
					<div class="field-text">
						<label for="username">Country:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->country; ?></span>
					</div>			
				</div>
				<div class="fields">
					<div class="field-text">
						<label for="username">Telephone:</label>
					</div>
					<div class="static-field">
						<span><?php echo $account->telephone; ?></span>
					</div>			
				</div>
				<div class="add-page-information">
					<span>If you want to change your account details click edit button and save the changes.</span> 
				</div>
				<div class="bottom-line"></div>	
			</div>
			<div class="new">
				<button class="edit-button" type="button" onclick="window.location.assign('<?php echo base_url('admin/account/manage/');?>')"></button>
			</div>
		</div>
		<div class="bottom-line"></div>
	</div>
</div>