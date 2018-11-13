<div class="wrap">
    <h1>Admin Fields Demo</h1>
    <?php settings_errors(); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab-1">Manage Settings</a></li>
        <li><a href="#tab-2">Shortcodes</a></li>
        <li><a href="#tab-3">About</a></li>
    </ul>

    <div class="tab-content">
        <div id="tab-1" class="tab-pane active">
            <form method="post" action="options.php">
            <?php
                settings_fields('st_options_group');
                do_settings_sections('scantrust_plugin');
                submit_button();
            ?>
            </form>
        </div>
        <div id="tab-2" class="tab-pane">
            <h3>Shortcodes</h3>
            Test your shortcodes easily at:

            scantrust_plugin_endpoint: 

<?php
// check for variables here:
?>
        </div>
        <div id="tab-3" class="tab-pane">
            <h3>About this amazing plugin</h3>
        </div>

    </div>
</div>

