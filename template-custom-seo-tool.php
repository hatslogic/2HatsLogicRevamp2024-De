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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <style>
        #loading {
            display: none; /* Hide the loading message initially */
        }

        @keyframes popIn {
            from {
                transform: scale(0) translateY(10px); /* Start small and slightly below */
                opacity: 0; /* Start invisible */
            }
            to {
                transform: scale(1) translateY(0); /* Scale to original size and move to original position */
                opacity: 1; /* Fade in */
            }
        }

        .animate-pop-in {
            opacity: 0; /* Ensure elements start invisible */
        }

        .pop-in {
            animation: popIn 0.5s ease-out forwards; /* Play animation and retain end state */
        }
        #hideSection{
            position: absolute;
            background: #d2d2d226;
            height: 50px;
            margin-top: -5px;
            width: 100%;
            z-index: 10;
            display: none;
        }
        .header-underline {
            border: none;              /* Remove the default border */
            height: 2px;               /* Thickness of the underline */
            background-color: #0d6ffd;     /* Color of the underline */
            width: 100px;               /* Length of the underline */
            margin: 10px auto;          /* Center the underline */
        }
     </style>
    <?php wp_head(); ?>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="bg-white shadow rounded p-5 mx-auto" style="max-width: 800px;">
            <div class="text-center">
                <h1 class="fs-2 fw-bold text-primary">SEO Performance Checker</h1>
                <hr class="header-underline">
            </div>
            
            <div id="inputSection" class="input-group mb-3 mt-5">
                <div id="hideSection"></div>

                <input 
                    type="text" 
                    id="urlInput" 
                    placeholder="Enter website URL"
                    class="form-control"
                />  
                <button
                    id="checkBtn"
                    class="btn btn-primary"
                >
                    Check SEO
                </button>
            </div>
            <label>
                <input type="checkbox" id="useOpenAPI"> Use AI SEO Check
            </label>
            <div id="results" class="mt-4">
                <!-- SEO Results will be displayed here -->
            </div>

            <div id="loading" class="text-center text-primary fw-semibold mb-3 mt-4">
                Loading, please wait... <br><br>
                <i class="fa fa-spinner fa-pulse fa-3x" ></i>
            </div>
        </div>
    </div>
    <script>
        
    </script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.min.js" integrity="sha512-ykZ1QQr0Jy/4ZkvKuqWn4iF3lqPZyij9iRv6sGqLRdTPkY69YX6+7wvVGmsdBbiIfN/8OdsI7HABjvEok6ZopQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?php wp_footer(); ?>
</body>
</html>
