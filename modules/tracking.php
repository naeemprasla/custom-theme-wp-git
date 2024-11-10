<?php

// JS Code FOR TRACKING

function theme_tracking_code()
{


    $google_ana =   get_theme_mod('ga_url_setting');
    $google_tags =   get_theme_mod('gtag_url_setting');
    $facebook_pixels =   get_theme_mod('fbpixel_url_setting');

    if (get_theme_mod('enable_tracking_codes') == 1) { // true


?>


      
        <?php if (!empty($google_ana)) : ?>
              <!-- Google Analytics -->
            <script>
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

                ga('create', '<?php echo  $google_ana;  ?>', 'auto');
                ga('send', 'pageview');
            </script>
            <!-- End Google Analytics -->
        <?php endif; ?>

        <?php if (!empty($google_tags)) : ?>
            <!--  Google TAGS -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo  $google_tags; ?>"></script>
            <script>
                window.dataLayer = window.dataLayer || [];

                function gtag() {
                    window.dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', '<?php echo  $google_tags; ?>');
            </script>
            <!-- End Google TAGS -->
        <?php endif; ?>

        <?php if (!empty($facebook_pixels)) : ?>
            <!-- Facebook Pixel Code -->
            <script>
                ! function(f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function() {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s)
                }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '<?php echo  $facebook_pixels; ?>');
                fbq('track', 'PageView');
            </script>
            <noscript>
                <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=<?php echo  $facebook_pixels; ?>&ev=PageView&noscript=1" />
            </noscript>
            <!-- End Facebook Pixel Code -->
        <?php endif; ?>

<?php


    }
}

add_action('wp_footer', 'theme_tracking_code');