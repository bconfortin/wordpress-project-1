        <footer class="mtop-30 bg-primario">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            Teste
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php $home = get_template_directory_uri(); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?= $home; ?>/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
        <?php wp_footer(); ?>
    </body>
</html>
