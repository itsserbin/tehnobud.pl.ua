$(document).ready(function () {
    $('.object-slider').slick({
        prevArrow: '<div class="prev"><svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.7903 0.387101L8.70711 0.292893C8.34662 -0.0675905 7.77939 -0.0953204 7.3871 0.209704L7.29289 0.292893L0.292892 7.29289L0.251495 7.33685L0.196335 7.40469L0.124672 7.51594L0.0712261 7.62866L0.0358448 7.73401L0.00690651 7.8819L0 8L0.00278854 8.07524L0.0202408 8.20073L0.0497379 8.31214L0.0936737 8.42322L0.145996 8.52071L0.219688 8.62545L0.292892 8.70711L7.29289 15.7071C7.68342 16.0976 8.31658 16.0976 8.70711 15.7071C9.06759 15.3466 9.09532 14.7794 8.7903 14.3871L8.70711 14.2929L3.416 9H19C19.5523 9 20 8.55228 20 8C20 7.44772 19.5523 7 19 7H3.414L8.70711 1.70711C9.06759 1.34662 9.09532 0.779392 8.7903 0.387101L8.70711 0.292893L8.7903 0.387101Z" fill="#0F0F0F"/></svg></div>',
        nextArrow: '<div class="next"><svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M11.2097 0.387101L11.2929 0.292893C11.6534 -0.0675905 12.2206 -0.0953204 12.6129 0.209704L12.7071 0.292893L19.7071 7.29289L19.7485 7.33685L19.8037 7.40469L19.8753 7.51594L19.9288 7.62866L19.9642 7.73401L19.9931 7.8819L20 8L19.9972 8.07524L19.9798 8.20073L19.9503 8.31214L19.9063 8.42322L19.854 8.52071L19.7803 8.62545L19.7071 8.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071C10.9324 15.3466 10.9047 14.7794 11.2097 14.3871L11.2929 14.2929L16.584 9H1C0.447715 9 0 8.55228 0 8C0 7.44772 0.447715 7 1 7H16.586L11.2929 1.70711C10.9324 1.34662 10.9047 0.779392 11.2097 0.387101L11.2929 0.292893L11.2097 0.387101Z" fill="#0F0F0F"/></svg></div>'
    });

    $('#call-back-modal').on("show.bs.modal", function (event) {
        const button = $(event.relatedTarget);
        const nameForm = button.data("name-form") ?? 'Форма';

        const modal = $(this);
        modal.find('#call-back').append(`<input id="name_form" type='hidden' value='${nameForm}' name="name_form"/>`)
    });

    $('#call-back-modal').on("hidden.bs.modal", function (event) {
        const modal = $(this);
        modal.find('#call-back').find("#name_form").remove();
    });

    $('.home-slider').slick({
        infinite: true,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        speed: 1500,
    });

    $(".lightbox_related_video3").colorbox({
        transition: 'elastic',
        inline: true,
        rel: 'lightbox5',
        fixed: false,
        maxWidth: '90%',
        maxHeight: '80%',
        innerWidth: '70%',
        innerHeight: '90%',
        opacity: 0.7,
    });

    $('#city_id').on('change', function (e) {
        e.preventDefault();
        let id = $(this).find('option:selected').attr('id');
        $('#more_city').val(id);
        $('#district_id').find('option:not(:first)').remove();

        $.ajax({
            url: `api/districts/${id}`,
            type: 'GET',
            success: function (resp) {

                $.each(resp, function () {
                    $('<option/>', {
                        'value': this.id,
                        'text': this.name
                    }).appendTo('#district_id');
                });
            },
            error: function (error) {
                console.group('main.js', 'error', '32');
                console.log(error);
                console.groupEnd();
            }
        })
    })

    $('#more_page').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'GET',
            data: form.serialize(),
            success: function (resp) {
                // $('#buildings').empty();
                $(resp).appendTo('#buildings');
                let items = $('#buildings').find('.building-card'),
                    count = items.length;
                if (count % 6 !== 0) {
                    $('#more_page').hide();
                } else {
                    let page = count / 6;
                    $('#input_page').val(page);
                }
            },
            error: function (error) {
                console.group('main.js', 'error', '33');
                console.log(error);
                console.groupEnd();
            }
        })
    })

    $(document).on('change', '#district_id', function () {
        $('#search').click();
    })

    $('#home-filter').on('submit', function (e) {
        e.preventDefault();
        let form = $(this),
            district = $('#district_id').val();
        $('#more_district').val(district);
        $.ajax({
            url: form.attr('action'),
            type: 'GET',
            data: form.serialize(),
            success: function (resp) {
                $('#buildings').empty();
                $(resp).appendTo('#buildings');
            },
            error: function (error) {
                console.group('main.js', 'error', '33');
                console.log(error);
                console.groupEnd();
            }
        })
    })

    $(document).on('click', '.object-line', function () {
        let $this = $(this),
            counter = $this.data('counter'),
            name = $this.data('name'),
            plans = $('.wrapper-plans'),
            rooms = $('.wrapper-apartment');
        plans.addClass('d-none');
        rooms.addClass('d-none');
        $('.wrapper-buildings').find(`[data-housing='${counter}']`).removeClass('d-none');
        $('.apartments').find(`[data-rooms='${counter}']`).removeClass('d-none');
        $('.name-rooms').html(name);
    })

    $('#call-back').on('submit', function (e) {
        e.preventDefault();
        let form = $(this);
        $('.pseudo-btn').click();
        $.ajax({
            url: `/api/forms/callback`,
            type: 'POST',
            data: form.serialize(),
            success: function (resp) {
            },
            error: function (error) {
                console.group('main.js', 'error', '32');
                console.log(error);
                console.groupEnd();
            }
        })
    })

    $(window).scroll(function () {
        let $this = $(this),
            header = $('#header');
        if ($this.scrollTop() > 500) {
            header.addClass('fixed-header');
        } else {
            header.removeClass('fixed-header');
        }
    });

    $(document).on('click', '.share-link', function () {
        let location = document.location.href;
        $('#share_link').val(location);
    })

    $(document).on('click', '.copy-button', function () {
        let inputElement = $('#share_link');
        inputElement.select();
        document.execCommand('copy');
    })

    // $(document).on('click', '.to-catalog', function (e) {
    //     e.preventDefault();
    //
    //     let element = document.getElementById('catalog'),
    //         headerOffset = 75,
    //         elementPosition = element.getBoundingClientRect().top,
    //         offsetPosition = elementPosition - headerOffset;
    //     window.scrollTo({
    //         top: offsetPosition,
    //         behavior: "smooth"
    //     });
    // })
})
