<?php
/* Template Name: Custom SEO Tool Page */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEO Performance Checker</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
        integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
    @media(max-width: 64rem) {
        .md\:w-100 {
            width: 100% !important
        }
    }

    #loading,
    #cf7-loading {
        display: none;
        /* Hide the loading message initially */
    }

    @keyframes popIn {
        from {
            transform: scale(0) translateY(10px);
            /* Start small and slightly below */
            opacity: 0;
            /* Start invisible */
        }

        to {
            transform: scale(1) translateY(0);
            /* Scale to original size and move to original position */
            opacity: 1;
            /* Fade in */
        }
    }

    .animate-pop-in {
        opacity: 0;
        /* Ensure elements start invisible */
    }

    .pop-in {
        animation: popIn 0.5s ease-out forwards;
        /* Play animation and retain end state */
    }

    #hideSection {
        position: absolute;
        background: #d2d2d226;
        height: 50px;
        margin-top: -5px;
        width: 100%;
        z-index: 10;
        display: none;
    }

    .header-underline {
        border: none;
        /* Remove the default border */
        height: 2px;
        /* Thickness of the underline */
        background-color: #0d6ffd;
        /* Color of the underline */
        width: 100px;
        /* Length of the underline */
        margin: 10px auto;
        /* Center the underline */
    }

    .wpcf7-form-control-wrap {
        width: 100%;
    }
    </style>
    <?php wp_head(); ?>
</head>

<body class="bg-light">

    <header class="header transition z-12  top-0 w-100 md:bb-0 md:pb-20 pt-20 pb-20 animate bg-white">
        <div class="container">
            <div class="header-inner flex w-100 justify-between align-center">
                <a href="<?php echo home_url(); ?>" class="brand w-100 max-w-px-106 max-h-px-48"
                    aria-label="<?php echo get_bloginfo('name'); ?>">
                    <img src="https://www.2hatslogic.com/wp-content/themes/2hatslogic2024/dist/assets/img/brand/logo-wide.svg"
                        alt="2Hats logo" class="w-100 w-100 max-w-px-106 max-h-px-48" width="106" height="48">
                </a>
                <a href="<?php echo home_url(); ?>" target="_blank"
                    class="btn btn-primary ml-40 xl:ml-30 sm:inline-flex" rel="noopener noreferrer">Visit our
                    site</a>

            </div>


        </div>
    </header>




    <?php
    $userInfoForm = get_field('user_information_form', 'option');
    $userCookieExist = '';
    $seoToolDisplay = 'none';
    if (isset($_COOKIE['seo-tool-user-submitted']) && $_COOKIE['seo-tool-user-submitted'] === 'true') {
        $userCookieExist = $_COOKIE['seo-tool-user-submitted'];
        $seoToolDisplay = 'block';
    }
    ?>
    <!-- User information form -->
    <div class="container py-5 pb-0">

        <div class="contact-wrap bg-white transition show ">
            <div class="flex align-center justify-between md:wrap">
                <div class=" w-50  md:mr-0 md:w-100 md:mt-0 animate" id="seo-img">
                    <img src="https://www.2hatslogic.com/wp-content/webp-express/webp-images/uploads/bis-images/7303/IMG_3599-1-840x840-f50_50.jpg.webp"
                        class="transition" loading="eager" fetchpriority="high" alt="" width="531" height="654">
                </div>
                <?php if (!$userCookieExist): ?>
                <div class=" w-50 mr-50 xl:mr-30 md:mr-0 md:w-100 md:mt-0 animate" id="form-container">




                    <div class="p-5 mx-auto">

                        <?php echo do_shortcode( '[contact-form-7 id="'.$userInfoForm->ID.'" title="SEO Tool User Information"]' )  ?>

                        <div id="form-message" class="mt-3 text-center text-danger"></div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- URL search form -->
                <div class=" w-50 mr-50 xl:mr-30 md:mr-0 md:w-100 md:mt-0 animate" id="content-container"
                    style="display:<?php echo $seoToolDisplay; ?>">
                    <div class="p-5 mx-auto">
                        <div class="text-left">
                            <h2 class="h3">Free Ai SEO Audit & Reporting Tool</h2>
                        </div>

                        <div id="inputSection" class="input-group mb-3 mt-5">
                            <div id="hideSection"></div>
                            <input type="text" id="urlInput" placeholder="Enter website URL" class="form-control" />
                            <button id="checkBtn" class="btn btn-primary"> Check SEO </button>
                        </div>
                        <label>
                            <input type="checkbox" id="useOpenAPI"> Use AI SEO Check
                        </label>
                        <div id="results" class="mt-4">
                            <!-- SEO Results will be displayed here -->
                        </div>

                        <div id="loading" class="text-center text-primary fw-semibold mb-3 mt-4">
                            Loading, please wait... <br><br>
                            <i class="fa fa-spinner fa-pulse fa-3x"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <footer class="footer animate mt-40">
            <div class="container px-0">

                <div
                    class="footer-bottom flex align-center justify-between xs:wrap xs:column b-0 bt-1 py-30 xs:pb-50 bc-hash solid fs-14 xxl:fs-16">
                    <div class="copyright xs:mt-20 md:w-100 md:align-center flex  justify-first md:justify-center ">© <span id="year">2024</span> 2Hats Logic Solutions
                        Private Limited</div>

                        <div class="social-media flex md:w-100 align-center justify-center fs-22 md:mt-20">

                        <a href="https://www.linkedin.com/company/2hats-logic" class="flex align-center" target="_blank"
                            aria-label="linkedin"> <i class="bi bi-linkedin"></i> </a>
                        <a href="https://www.instagram.com/2hatslogic/" class="flex align-center ml-20" target="_blank"
                            aria-label="instagram"> <i class="bi bi-instagram"></i> </a>
                        <a href="https://www.youtube.com/@2hatslogic" class="flex align-center ml-20" target="_blank"
                            aria-label="youtube"> <i class="bi bi-youtube"></i> </a> <a
                            href="https://www.facebook.com/2hatslogic" class="flex align-center ml-20" target="_blank"
                            aria-label="facebook"><i class="bi bi-facebook"></i> </a> <a
                            href="https://twitter.com/2HatsLogic" class="flex align-center ml-20" target="_blank"
                            aria-label="twitter"> <i class="bi bi-twitter-x"></i> </a>
                    </div>

                    <div class="terms md:w-100 md:mt-20 flex justify-end md:justify-center"><a
                            href="https://www.2hatslogic.com/terms-and-conditions/" aria-label="terms">Terms and
                            Conditions</a> | <a href="https://www.2hatslogic.com/privacy-policy/"
                            aria-label="privacy">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>





        <script>

        </script>
        <!-- Bootstrap JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js"
            integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
        jQuery(document).ready(function($) {

            $('#checkBtn').click(function() {
                $('#seo-img').fadeOut(); // Fade out the #seo-img div
                $('#content-container').addClass('w-100'); // Add class w-100 to #content-container
            });

            document.addEventListener('wpcf7mailsent', function(event) {
                
                if (event.detail.contactFormId == '<?php echo $userInfoForm->ID ?>') {

                    var username = $('#name').val();
                    var email = $('#email').val();

                    $.ajax({
                        url: '<?php echo admin_url('admin-ajax.php'); ?>',
                        type: 'POST',
                        data: {
                            action: 'set_user_submitted_cookie',
                            username: username,
                            email: email,
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success) {
                                $('#form-container').hide();
                                $('#content-container').fadeIn();
                            } else {
                                $('#form-message').text(response.data.message);
                            }
                            
                        },
                        error: function() {
                            $('#form-message').text('An error occurred. Please try again.');
                        }
                    });
                }
            }, false);
        });
        </script>
        <?php wp_footer(); ?>
</body>

</html>