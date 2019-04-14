// $("#contact-form").validator();
;(function($){
    $(document).ready(function(){
        // our portfolio area
        //------- Owl Carusel  js --------//
        $('#person').owlCarousel({
            loop:true,
            autoplay: false,
            margin: 30,
            nav:true,
            navElement: 'div',
            navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
            dots:false,
            autoplayHoverPause:true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                768: {
                    items: 3  
                },
                1000:{
                    items:4
                }
            }
        });

        var mixer = mixitup('.portfolio');

        // when the form is submitted
        $("#contact-form").on("submit", function (e) {
            // if the validator does not prevent form submit
            if (!e.isDefaultPrevented()) {
                var url = "contact.php";

                // FOR CODEPEN DEMO I WILL PROVIDE THE DEMO OUTPUT HERE, download the PHP files from
                // https://bootstrapious.com/p/how-to-build-a-working-bootstrap-contact-form

                var messageAlert = "alert-success";
                var messageText =
                    "Your message was sent, thank you. I will get back to you soon.";

                // let's compose Bootstrap alert box HTML
                var alertBox =
                    '<div class="alert ' +
                    messageAlert +
                    ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                    messageText +
                    "</div>";

                // If we have messageAlert and messageText
                if (messageAlert && messageText) {
                    // inject the alert to .messages div in our form
                    $("#contact-form").find(".messages").html(alertBox);
                    // empty the form
                    $("#contact-form")[0].reset();
                }

                return false;
            }
        });
        // contact us area end

        // working progress bar start
        $('.chart').easyPieChart({
            size: 180,
            barColor: '#0c1330', //17d3e6
            scaleColor: false,
            scaleLength: 0,
            lineWidth: 12,
            trackColor: '#f2f2f2',
            lineCap: 'circle',
            animate: 2000
        });
        // end working progress bar


    })
})(jQuery)
