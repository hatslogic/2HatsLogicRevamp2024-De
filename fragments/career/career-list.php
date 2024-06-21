<?php extract($section); ?>

<section class="career-list">
    <div class="container">
        <div class="title">
            <?php if (!empty($header['main_title'])): ?>
            <h2><?= $header['main_title']; ?></h2>
            <?php endif; ?>
            <?php if (!empty($header['sub_title'])): ?>
            <h3 class="h4 mt-40"><?= $header['sub_title']; ?></h3>
            <?php endif; ?>
            <?php if (!empty($header['content'])): ?>
            <p><?= $header['content']; ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($openings)): ?>
        <div class="content mt-60 xs:mt-30">
            <div class="list-wrap b-0 bb-1 bc-hash solid">
                <?php foreach ($openings as $opening): ?>
                <?php if (empty($opening['job_title'])) continue; ?>
                <div class="item flex md:wrap align-center justify-between b-0 bt-1 bc-hash solid py-30">
                    <h4 class="w-50 md:w-100 md:mb-15"><?= $opening['job_title']; ?></h4>
                    <div class="positions w-25 md:w-50"><?= $opening['no_of_positions']; ?></div>
                    <div class="experience w-25 md:w-50"><?= $opening['experience']; ?></div>
                    <div class="apply-now w-25 md:w-100 md:mt-20 flex align-center justify-end md:justify-start">
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=hr@2hatslogic.com" target="_blank" class="flex align-center gap-10">Apply Now
                            <i class="icon-arrow_circle_right fs-22"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php if (!empty($button)): ?>
            <div class="btn-group mt-60 center">
                <a href="<?= htmlspecialchars($button['url']); ?>"
                    class="btn btn-secondary"><?= htmlspecialchars($button['title']); ?></a>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>