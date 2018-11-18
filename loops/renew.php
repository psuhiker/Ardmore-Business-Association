<div id="content">

    <section class="content section-one-half" style="background-color: #f3f7eb;">
        <div class="container">
            <div class="col-sm-8 col-sm-offset-2">
                <h1 style="text-align: center;"><?php the_field('title'); ?></h1>
                <?php the_content(); ?>

                <div class="buttonOptions text-center">
                    <br><br><br>
                    <p>To get started, do you have a membership login already?</p>
                    <p>
                        <a href="#yes" aria-controls="home" role="tab" data-toggle="tab" class="btn button btn-blue deactivateButtons">Yes, I have a login</a>
                        <a href="#no" aria-controls="home" role="tab" data-toggle="tab" class="btn button btn-red deactivateButtons">No, I need to create one</a>
                    </p>
                </div>

            </div>
            <div class="clear"></div>
        </div>
    </section>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane member-login" id="yes">
            <a class="text-right activateButton btn btn-primary startOverButton">
                <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                Start Over
            </a>
            <?php include (TEMPLATEPATH . '/loops/member-login.php' ); ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="no">
            <a class="text-right activateButton btn btn-primary startOverButton">
                <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                Start Over
            </a>
            <section class="content section-one-half" style="background-color: #f3f7eb;">
                <div class="container">
                    <div class="col-sm-8 col-sm-offset-2 text-center">
                        <p>To create your login, you need to fill out our membership application. Once submitted, you will be redirected to the payment page and then to the account creation page.</p>
                        <p>
                            <a href="<?php echo site_url(); ?>/association/join/" class="btn button btn-blue">Let's Go!</a>
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        $('.deactivateButtons').click(function(){
            $('.buttonOptions').addClass('hidden');
        });
        $('.activateButton').click(function(){
            $('.buttonOptions').removeClass('hidden');
            $('.tab-pane').removeClass('active');
        });
    });
</script>
