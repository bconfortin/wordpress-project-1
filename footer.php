        <?php $home = get_template_directory_uri(); ?>
        <footer class="bg-primario">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-3">
                            <img src="<?= $home; ?>/img/plano-branca-2.png" alt="" class="padver-10" style="height: 40px;">
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
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Exo+2:300,400,700" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> -->
        <script>
            $("#hamburger-menu").on("click", function(e){
                e.preventDefault();
                $("body").toggleClass("overflow-hidden");
                $(".menu-overlay").toggleClass("hidden", 200);
                $("#hamburger-inner-menu").toggleClass("hidden-hamburger-menu", 200);
                $("#hamburger-menu .fa").toggleClass("fa-bars fa-times", 200);
                $("#hamburger-menu").toggleClass("force-white-link", 200);
            });

            $(".menu-overlay").on("click", function(){
                closeMenu();
            });

            $(document).keyup(function(e) {
                // esc maps to keycode "27"
                if (e.keyCode == 27) {
                    closeMenu();
                }
            });

            function closeMenu() {
                $("body").removeClass("overflow-hidden");
                $(".menu-overlay").addClass("hidden", 200);
                $("#hamburger-inner-menu").addClass("hidden-hamburger-menu", 200);
                $("#hamburger-menu .fa").addClass("fa-bars", 200).removeClass("fa-times", 200);
                $("#hamburger-menu").removeClass("force-white-link", 200);
            }
        </script>
        <?php wp_footer(); ?>
    </body>
</html>
