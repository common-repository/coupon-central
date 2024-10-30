import $ from "jquery";

$(document).ready(function () {
    /*============ Coupon Card =============*/
    let sdcc_card = {
        els: {
            show_excerpt: $(".sdcc-card__excerpt-show"),
        },
        data: {},
    };

    sdcc_card.els.show_excerpt.on("click", function (e) {
        e.preventDefault();

        let type = $(this).attr("data-type");
        let excerpt_el = $(this).parent(".sdcc-card__excerpt");
        let title_el = excerpt_el.prev(".sdcc-card__title");

        if (type == "more") {
            let excerpt_height = excerpt_el.height();
            let title_height = title_el.height();
            let height = excerpt_height + title_height + 70;
            $(this)
                .closest(".sdcc-card")
                .css({ height: `${height}px` });

            $(this).attr("data-type", "less");
            $(this).attr("title", sdcc_script.show_less_text);
            $(this).html(sdcc_script.show_less_text);
        }

        if (type == "less") {
            $(this).closest(".sdcc-card").removeAttr("style");
            $(this).attr("data-type", "more");
            $(this).attr("title", sdcc_script.show_more_text);
            $(this).html(sdcc_script.show_more_text);
        }
    });

    /*============ Coupon Page ============== */
    let sdcc_coupon_page = {
        els: {
            copy_btn: $("#sdcc-copy-code"),
            coupon_link: $("#sdcc-coupon-link"),
        },
        data: {},
    };

    // Copy code
    let sdcc_copy = new ClipboardJS("#sdcc-copy-code");
    sdcc_copy.on("success", function (e) {
        sdcc_coupon_page.els.copy_btn.html(sdcc_script.copied_text);
        e.clearSelection();

        $.ajax({
            type: "POST",
            url: sdcc_script.ajaxurl,
            data: {
                action: "sdcc_copy_click",
                nonce_ajax: sdcc_script.nonce,
                coupon_id: sdcc_coupon_page.els.copy_btn.data("id"),
            },
            success: function (res) {},
            error: function (err) {
                console.log(err);
            },
        });
    });
    sdcc_copy.on("error", function (e) {
        alert(sdcc_script.something_wrong_text);
    });

    // Click coupon link
    sdcc_coupon_page.els.coupon_link.on("click", function () {
        $.ajax({
            type: "POST",
            url: sdcc_script.ajaxurl,
            data: {
                action: "sdcc_coupon_link_click",
                nonce_ajax: sdcc_script.nonce,
                coupon_id: $(this).data("id"),
            },
            success: function (res) {
                let data = res.data;
                window.open(data.data, "_blank");
            },
            error: function (err) {
                console.log(err);
                alert(sdcc_script.something_wrong_text);
            },
        });
    });
});
