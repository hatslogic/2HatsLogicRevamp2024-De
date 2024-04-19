<?php extract($section); ?>

<section class="get-started bg-dark-primary c-white">
    <div class="container pt-100 pb-100 sm:pt-80 sm:pb-80">
        <div class="flex align-center">
            <div class="col w-45 sm:hidden">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/img/background/newsletter.svg"
                    alt="newsletter" loading="lazy" width="494px" height="328px">
            </div>
            <div class="col w-55 sm:w-100">
                <div class="form">
                    <div class="title">
                        <h2>Get a free 1 Hour Consultation Now!</h2>

                        <p>Drop us a line, and we'll get in touch to discuss how we can best assist
                            you!</p>
                    </div>
                    <div class="content">
                        <form class="form form-lined mt-40">
                            <div class="flex">
                                <div class="form-group col">
                                    <label for="name" class="hidden">Name</label>
                                    <input class="form-control lined" type="text" placeholder="Name" id="name"
                                        aria-label="name">
                                </div>
                                <div class="form-group col ml-20">
                                    <label for="email" class="hidden">Email</label>
                                    <input class="form-control lined" type="email" placeholder="Email" id="email"
                                        aria-label="email">
                                </div>
                            </div>
                            <div class="flex mt-20">
                                <div class="form-group">
                                    <label for="message" class="hidden">About Your Project</label>
                                    <textarea class="form-control lined" id="message" placeholder="About Your Project"
                                        aria-label="message"></textarea>
                                </div>
                            </div>
                            <div class="btn-group mt-50">
                                <button type="submit" aria-label="submit" class="btn btn-light">Contact us</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>