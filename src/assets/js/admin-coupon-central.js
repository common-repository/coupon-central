import $ from "jquery";
import "select2";

$(document).ready(function () {
    "use strict";

    /*=============== Meta box media uploader ================ */
    $(".sdcc-datepicker").datepicker();

    /*=============== Meta box media uploader ================ */
    // Instantiates the variable that holds the media library frame.
    var metaImageFrame;

    // Runs when the media button is clicked.
    $(".sdcc-media__add-btn").on("click", function () {
        // Get the field target
        var field_target = $(this).data("target-input");
        var preview_target = $(this).data("target-preview");

        // Sets up the media library frame
        metaImageFrame = wp.media.frames.metaImageFrame = wp.media({
            title: sdc_media_upload.title,
            button: { text: sdc_media_upload.button },
        });

        // Runs when an image is selected.
        metaImageFrame.on("select", function () {
            // Grabs the attachment selection and creates a JSON representation of the model.
            var media_attachment = metaImageFrame
                .state()
                .get("selection")
                .first()
                .toJSON();

            // Sends the attachment URL to our custom image input field.
            $(field_target).val(media_attachment.url);
            $(preview_target).attr("src", media_attachment.url);
            $(preview_target).parent().removeClass("sdcc-hide");
            $(".sdcc-media__remove-wrapper").removeClass("sdcc-hide");
        });

        // Opens the media library frame.
        metaImageFrame.open();
    });

    // On click remove media button
    $(".sdcc-media__remove").on("click", function (e) {
        e.preventDefault();

        // Get the field target
        var field_target = $(this).data("target-input");
        var preview_target = $(this).data("target-preview");

        $(field_target).val("");
        $(preview_target).attr("src", "");
        $(preview_target).parent().addClass("sdcc-hide");
        $(".sdcc-media__remove-wrapper").addClass("sdcc-hide");
    });

    // Select2
    $(".sdcc-select2").select2({
        placeholder: "Select an option",
    });
});
