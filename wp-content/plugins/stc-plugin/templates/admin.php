<div class="wrap">
<h1>Admin Fields Demo</h1>
<?php settings_errors(); ?>

<form method="post" action="options.php">
<?php
    settings_fields('st_options_group');
    do_settings_sections('scantrust_plugin');
    submit_button();
?>
</form>

</div>

