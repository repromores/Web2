<script id="IntercomSettingsScriptTag">
  var intercomSettings = {
    // TODO: The current logged in user's email address.
    email: "<?php echo $_SESSION['usr_email']; ?>",
    // TODO: The current logged in user's sign-up date as a Unix timestamp.
    created_at: <?php echo $_SESSION["usr_loggedinat"]; ?>,
    app_id: "yxd3ddmg"
  };
</script>
<script>(function(){var w=window;var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://api.intercom.io/api/js/library.js';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}})();</script>
