<?php extract($section); ?>

<section class="working-models">
    <div class="container">
        <div class="title">
            <?php if($headline): ?>
                <h2 class="h2"><?php echo $headline; ?></h2>
            <?php endif; ?>
        </div>
        <div class="content mt-60 xs:mt-30">
        <div class="grid grid-2 md:grid-1 gap-60">
            <div class="col card">
                <div class="item">
                    <?php if($working_model_1['image']): ?>
                        <div class="img-wrap">
                            <img src="<?php echo $working_model_1['image']['url'] ?>" alt="<?php echo $working_model_1['image']['title'] ?>" width="360" height="180" class="w-100 max-w-px-320">
                        </div>
                    <?php endif; ?>
                    <div class="info mt-40">
                        <?php if($working_model_1['title']): ?>
                            <h3 class="h6 transition font-bold"><?php echo $working_model_1['title'] ?></h3>
                        <?php endif; ?>
                        <span class="line block mt-10 mb-10 h-px-1 w-px-150 bc-primary solid b-0 bb-2"></span>
                        <?php if($working_model_1['description']): ?>
                            <p><?php echo $working_model_1['description'] ?></p>
                        <?php endif; ?>
                        <?php if($working_model_1['button']): ?>
                            <div class="btn-group mt-40">
                                <a href="<?php echo $working_model_1['button']['url'] ?>" class="btn btn-secondary"><?php echo $working_model_1['button']['title'] ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col card">
                <div class="item">
                <?php if($working_model_2['image']): ?>
                    <div class="img-wrap">
                        <img src="<?php echo $working_model_2['image']['url'] ?>" alt="<?php echo $working_model_2['image']['title'] ?>" width="360" height="180" class="w-100 max-w-px-320">
                    </div>
                <?php endif; ?>
                <div class="info mt-40">
                    <?php if($working_model_2['title']): ?>
                        <h3 class="h3 transition font-bold"><?php echo $working_model_2['title'] ?></h3>
                    <?php endif; ?>
                    <span class="line block mt-10 mb-10 h-px-1 w-px-150 bc-primary solid b-0 bb-2"></span>
                    <?php if($working_model_2['description']): ?>
                        <p><?php echo $working_model_2['description'] ?></p>
                    <?php endif; ?>
                    <?php if($working_model_2['button']): ?>
                        <div class="btn-group mt-40">
                            <a href="<?php echo $working_model_2['button']['url'] ?>" class="btn btn-secondary"><?php echo $working_model_2['button']['title'] ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>