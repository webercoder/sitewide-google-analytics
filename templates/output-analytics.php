<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', '<?php echo $data[Sitewide_Google_Analytics::$ID_KEY]; ?>']);
  <?php if ( isset( $data[Sitewide_Google_Analytics::$DOMAIN_KEY] ) && strlen( $data[Sitewide_Google_Analytics::$DOMAIN_KEY] ) > 0 ): ?>
  _gaq.push(['_setDomainName', '<?php echo $data[Sitewide_Google_Analytics::$DOMAIN_KEY]; ?>']);
  <?php endif; ?>
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
