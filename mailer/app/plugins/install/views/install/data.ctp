<div class="install">
     <h2 style="margin-top:0;"><?php echo $title_for_layout; ?></h2>

    <?php
        echo $html->link(__('Click here to build your database', true), array(
            'plugin' => 'install',
            'controller' => 'install',
            'action' => 'data',
            'run' => 1,
        ),array("class"=>"button"));
    ?><br /><br />
</div>