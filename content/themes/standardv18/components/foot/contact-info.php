<div class="layout-td col-1">
    <div class="info">
        <address><?php echo get_field("contact_address", "options"); ?></address>
        <p class="label">delivery &amp; mail</p>
    </div>           
    <div class="layout-table">
        <div class="layout-td info phone">
            <p><?php echo get_field("contact_phone", "options"); ?></p>
            <p class="label">call</p>
        </div>
        <div class="layout-td info">
            <p><a href="mailto:TheStandard.Gre@lead2lease.com">
            	<?php echo get_field("contact_email", "options"); ?>
        	</a></p>
            <p class="label">email</p>
        </div>
    </div>
</div>