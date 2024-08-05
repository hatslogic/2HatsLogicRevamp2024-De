<?php extract($section); ?>
<section class="case-study-challenges">
    <div class="container">
        <div class="max-w-75 xs:max-w-100 mx-auto px-60 xs:px-0">
            <?php if (!empty($title) || !empty($content)) {?>
                <?php if (!empty($title) || !empty($headline)) { ?>
                    <div class="title">
                        <?php if (!empty($headline)) { ?>
                        <span class="headline c-primary font-bold"><?php echo $headline; ?></span>
                        <?php } ?>
                        <h2><?php echo $title; ?></h2>
                    </div>
                <?php } ?>
                <?php if (!empty($content)) { ?>
                    <div class="content">
                        <p><?php echo $content; ?></p>
                    </div>
                <?php } ?>
            <?php } ?>
            <?php if (!empty($list)) { ?>
            <div class="grid grid-2 md:grid-1 mt-40 cg-30 rg-30 w-100">
                <?php foreach ($list as $key => $list) { ?>
                    <?php if (!empty($list['list_item'])) { ?>
                    <div class="col">
                        <div class="info flex">
                            <div class="icon-wrap pt-5 c-primary"> <i class="icomoon icon-double-arrow"></i>

                            </div>
                            <div class="content ml-15">
                                <p class="mt-0 mb-0 fs-15 lh-1-5"><?php echo $list['list_item']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php if (!empty($enable_technical_facts)) { ?>
        <div class="max-w-75 xs:max-w-100 mx-auto px-60 xs:px-0 mt-60">
            <?php if (!empty($facts_heading)) { ?>
            <div class="title">
                <h3> <?php echo $facts_heading; ?> </h3>

            </div>
            <?php } ?>
            <?php if (!empty($facts)) { ?>
            <div class="grid grid-3 lg:grid-2 md:grid-1 mt-30 cg-30 rg-30 w-100">
                <?php foreach ($facts as $key => $fact) { ?>
                <div class="col">
                    <div class="info flex">
                        <div class="count-wrap fs-30 c-primary"><?php echo sprintf('%02d', $key + 1); ?></div>
                        <div class="content ml-15">
                            <?php if (!empty($fact['fact_title'])) { ?>
                            <h4><?php echo $fact['fact_title']; ?></h4>
                            <?php } ?>
                            <?php if (!empty($fact['description'])) { ?>
                            <p class="mt-15 mb-0"><?php echo $fact['description']; ?></p>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</section>