
	<footer class='site-footer'>
		<p>
            &copy; SNU Quill, <?php echo date("Y"); ?><br>
            <a href="https://github.com/graup/snuquill">Code on Github</a>
        </p>
	</footer>

    <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-57229310-1', 'auto');
    ga('send', 'pageview');

    </script>

	<?php
    /* Always have wp_footer() just before the closing </body>
     * tag of your theme, or you will break many plugins, which
     * generally use this hook to reference JavaScript files.
     */

    wp_footer();
    ?>
</body>
</html>