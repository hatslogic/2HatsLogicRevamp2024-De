<?php extract($section); ?>

<section class="we-help-develop bg-light-grey c-secondary pt-100 pb-100 xs:pt-80 xs:pb-80 relative">
    <img src="<?php echo $image['url']; ?>" alt="bg" height="100" width="100" fetchpriority="high"
        class="absolute z-0 inset-0 ml-auto my-auto mr-0 w-auto max-h-90 max-w-90 xs:hidden">
    <div class="container">
        <div class="title max-w-75 xs:max-w-100">
            <h2 class="b-0 solid bl-5 bc-pigment pl-20 mb-40"><?php echo $title; ?></h2>
            <p><?php echo $description; ?></p>
        </div>
    </div>
</section>