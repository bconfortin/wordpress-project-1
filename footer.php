        <?php $home = get_template_directory_uri(); ?>
        <footer class="bg-primario">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="<?= $home; ?>/img/plano-branca-2.png" alt="" class="img-responsive padver-10" style="height: 40px;">
                        </div>
                        <div class="col-xs-9">
                            <p class="text-right mbottom-0 color-fff padver-10">Avenida Brasil, número 222. Centro. Foz do Iguaçu - PR</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= $home; ?>/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
        <?php wp_footer(); ?>
    </body>
</html>
