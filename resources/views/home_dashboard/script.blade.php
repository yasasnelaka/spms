<!--  SCRIPTS  -->
<!-- JQuery -->
<script type="text/javascript" src="../../js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="../../js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="../../js/mdb.min.js"></script>
<script>
    new WOW().init();

</script>
<script>
    // initialize scrollspy
    $('body').scrollspy({

        target: '.dotted-scrollspy'
    });

    // initialize lightbox
    $(function () {

        $("#mdb-lightbox-ui").load("../mdb-addons/mdb-lightbox-ui.html");
    });

    $('.navbar-collapse a').click(function () {

        $(".navbar-collapse").collapse('hide');
    });

    /* WOW.js init */
    new WOW().init();


</script>
<script>
    (($) => {

        class Toggle {

            constructor(element, options) {

                this.defaults = {
                    icon: 'fa-eye'
                };

                this.options = this.assignOptions(options);

                this.$element = element;
                this.$button = $(`<button type="button" class="btn-toggle-pass text-white"><i class="fa ${this.options.icon}"></i></button>`);

                this.init();
            };

            assignOptions(options) {

                return $.extend({}, this.defaults, options);
            }

            init() {

                this._appendButton();
                this.bindEvents();
            }

            _appendButton() {
                this.$element.after(this.$button);
            }

            bindEvents() {

                this.$button.on('click touchstart', this.handleClick.bind(this));
            }

            handleClick() {

                let type = this.$element.attr('type');

                type = type === 'password' ? 'text' : 'password';

                this.$element.attr('type', type);
                this.$button.toggleClass('active');
            }
        }

        $.fn.togglePassword = function (options) {
            return this.each(function () {
                new Toggle($(this), options);
            });
        }

    })(jQuery);

    $(document).ready(function() {
        $('#password').togglePassword();

    })


</script>
