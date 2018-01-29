
jQuery("#select-change").change(function () {
    var showSection = jQuery("#select-change option:selected").val();
    if (showSection === 'registrant_address') {
        jQuery("#contact-info").removeClass("hide-me").addClass("show-me");
    } else {
        jQuery("#contact-info").removeClass("show-me").addClass("hide-me");
    }
    if (showSection === 'Registrant_FirstName') {
        jQuery("#Registrant-FirstName").removeClass("hide-me").addClass("show-me");
    } else {
        jQuery("#Registrant-FirstName").removeClass("show-me").addClass("hide-me");
    }

    if (showSection === 'Registrant_Lastname') {
        jQuery("#Registrant-Lastname").removeClass("hide-me").addClass("show-me");
    } else {
        jQuery("#Registrant-Lastname").removeClass("show-me").addClass("hide-me");
    }

    if (showSection === 'registrant_email') {
        jQuery("#registrant-email").removeClass("hide-me").addClass("show-me");
    } else {
        jQuery("#registrant-email").removeClass("show-me").addClass("hide-me");
    }

    if (showSection === 'registrant_phonenumber') {
        jQuery("#Registrant-phonenumber").removeClass("hide-me").addClass("show-me");
    } else {
        jQuery("#Registrant-phonenumber").removeClass("show-me").addClass("hide-me");
    }

    if (showSection === 'Ns_list') {
        jQuery("#Ns-list").removeClass("hide-me").addClass("show-me");
    } else {
        jQuery("#Ns-list").removeClass("show-me").addClass("hide-me");
    }

});

/*-----Our tabs-----*/
jQuery(function () {
    jQuery("#tabs").tabs();
});