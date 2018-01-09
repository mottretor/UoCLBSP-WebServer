(function ($) {
                $(function () { // DOM Ready

                    // Toggle navigation
                    $('#nav-toggle').click(function () {
                        // console.log( $('#nav-toggle').classList);
                        // console.log(this);
                        this.classList.toggle("active");
                        // If sidebar is visible:
                        if ($('body').hasClass('show-nav')) {
                            // Hide sidebar
                            $('#cont').css('padding-right', '30px');
                            $('body').removeClass('show-nav');

                        } else { // If sidebar is hidden:
                            $('body').addClass('show-nav');
                            $('#cont').css('padding-right', '280px');
                            // Display sidebar
                        }
                    });
                });
            })(jQuery);

            $(document).ready(function () {
                var trigger = $('#nav ul li a'),
                        contain = $('#cont');

                trigger.on('click', function () {
                    var $this = $(this),
                            target = $this.attr('data-target');
                    // console.log(target+'.php');

                    $.ajax({
                        url:  target,
                        method: 'GET',
                        success: function (data) {
                            contain.html(data);


                            // Toggle navigation
                            // $('#nav-toggle').click(function () {
                            // console.log( $('#nav-toggle').classList);
                            // $('#nav-toggle').classList.toggle("active");
                            document.getElementById('nav-toggle').classList.toggle("active");
                            // If sidebar is visible:
                            if ($('body').hasClass('show-nav')) {
                                // Hide sidebar
                                $('body').removeClass('show-nav');
                            } else { // If sidebar is hidden:
                                $('body').addClass('show-nav');

                                // Display sidebar
                            }

                            return false;
                            // });
                        }
                    });

                    //contain.load('<?php //echo base_url();  ?>//'+ 'index.php/Manage_building/add_building');

                    // return false;

                });
            });