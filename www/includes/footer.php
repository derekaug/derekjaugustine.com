<?php
include_once(__DIR__ . '/../vendor_class/autoload.php');
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
                        <a href="https://stackoverflow.com/users/727182/derekaug" target="_blank"
                           title="Stack Overflow">
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
<?php include_once(__DIR__ . '/templates.php'); ?>
<?php include_once(__DIR__ . '/globals.php'); ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="/vendor/jquery/dist/jquery.min.js"><\/script>')</script>
    <script src="/js/vendor.comb.js"></script>
    <script src="/js/dja.comb.js"></script>
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-50586645-1', 'derekjaugustine.com');
        ga('send', 'pageview');
    </script>
<?php if (Config::$environment === 'development') { ?>
    <script src="//localhost:35729/livereload.js"></script>
<?php } ?>