<div class="col w-50 md:w-100 content">
    <h1 class="h2 mb-16"><?php echo get_the_title(); ?></h1>
    <p class="mb-20"><?php echo get_the_content(); ?></p>
    <div class="flex">
        <p class="c-breadcrumb-grey mt-0 mb-0">Edition:</p>
        <ul class="flex flex-wrap align-center font-bold mt-0 mb-0 ml-4 no-bullets">
            <?php $editionsList = get_field('edition'); ?>
            <?php if($editionsList): ?>
                <?php foreach($editionsList as $edition): ?>
                    <!-- <span class="list-bullet"></span> -->
                    <li class="pl-12 pr-12 underline"><?php echo $edition['label']; ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="btn-group mt-30">
        <button onclick="openModal('make-an-enquiry')" class="btn orange-btn">Make an Enquiry</button>
    </div>
    <p class="mt-30 fs-20 font-bold">Key Features</p>
    <ol class="pl-20 mt-16 lh-1-6">
        <?php 
        if( have_rows('key_features') ):
            while( have_rows('key_features') ) : the_row();
                $feature = get_sub_field('feature'); ?>
                <li><?php echo $feature; ?></li>
            <?php 
            endwhile;
        endif; ?>
    </ol>
    <div class="btn-group mt-30">
        <button onclick="openModal('book-a-demo')" class="btn orange-btn-outline">Book a Live Demo</button>
    </div>
</div>