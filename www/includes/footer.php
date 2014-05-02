<?php
include_once(__DIR__ . '/../auto.php');
?>
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div id="divSocialLinks" class="text-center">
                    <a href="https://github.com/derekaug" target="_blank" title="GitHub">
                        <i class="fa fa-github"></i>
                        <span class="sr-only">GitHub</span>
                    </a>
                    <a href="https://bitbucket.org/derekaug" target="blank" title="BitBucket">
                        <i class="fa fa-bitbucket"></i>
                        <span class="sr-only">BitBucket</span>
                    </a>
                    <a href="https://stackoverflow.com/users/727182/derekaug" target="_blank" title="Stack Overflow">
                        <i class="fa fa-stack-overflow"></i>
                        <span class="sr-only">Stack Overflow</span>
                    </a>
                    <a href="https://www.facebook.com/derekaug" target="_blank" title="Facebook">
                        <i class="fa fa-facebook"></i>
                        <span class="sr-only">Facebook</span>
                    </a>
                    <a href="https://twitter.com/derekaug" target="_blank" title="Twitter">
                        <i class="fa fa-twitter"></i>
                        <span class="sr-only">Twitter</span>
                    </a>
                    <a href="https://www.linkedin.com/in/derekaug" target="_blank" title="Linkedin">
                        <i class="fa fa-linkedin"></i>
                        <span class="sr-only">Linkedin</span>
                    </a>
                </div>
                <div id="divCopyright" class="text-center">
                    &copy; <?php echo date('Y', time()); ?> Derek J. Augustine
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/vendor/jquery/dist/jquery.min.js"><\/script>')</script>
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X');
    ga('send', 'pageview');
</script>