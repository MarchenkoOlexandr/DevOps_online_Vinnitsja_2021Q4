jQuery(document).ready(function($) {
    $('.tcode').textillate({
        loop: true,
        minDisplayTime: 5000,
        initialDelay: 800,
        autoStart: true,
        inEffects: [],
        outEffects: [],
        in: {
            effect: 'rollIn',
            delayScale: 1.5,
            delay: 50,
            sync: false,
            shuffle: true,
            reverse: false,
            callback: function() {}
        },
        out: {
            effect: 'fadeOut',
            delayScale: 1.5,
            delay: 50,
            sync: false,
            shuffle: true,
            reverse: false,
            callback: function() {}
        },
        callback: function() {}
    });
})

jQuery(document).ready(function($) {
    var thumb = jQuery('#ytthumbnail');
    var select = this.value;

    if (jQuery('#ytthumbnail').is(":checked")) {
        jQuery('.ytselectthumbtr').show();
    } else {
        jQuery('.ytselectthumbtr').hide();
    }

    thumb.change(function() {
        if (jQuery('#ytthumbnail').is(":checked")) {
            jQuery('.ytselectthumbtr').fadeIn();
        } else {
            jQuery('.ytselectthumbtr').hide();
        }
    });

    var tax = jQuery('#ytexclude');

    if (jQuery('#ytexclude').is(":checked")) {
        jQuery('.yttaxlisttr').show();
    } else {
        jQuery('.yttaxlisttr').hide();
    }

    tax.change(function() {
        if (jQuery('#ytexclude').is(":checked")) {
            jQuery('.yttaxlisttr').fadeIn();
        } else {
            jQuery('.yttaxlisttr').hide();
        }
    });

    var razb = jQuery('#ytrazb');

    if (jQuery('#ytrazb').is(":checked")) {
        jQuery('.ytrazbnumbertr').show();
    } else {
        jQuery('.ytrazbnumbertr').hide();
    }

    razb.change(function() {
        if (jQuery('#ytrazb').is(":checked")) {
            jQuery('.ytrazbnumbertr').fadeIn();
        } else {
            jQuery('.ytrazbnumbertr').hide();
        }
    });



    if (jQuery('#ytrelated').is(":checked")) {
        jQuery('.ytrelatedchildtr').show();
    } else {
        jQuery('.ytrelatedchildtr').hide();
    }
    var related = jQuery('#ytrelated');
    related.change(function() {
        if (jQuery('#ytrelated').is(":checked")) {
            jQuery('.ytrelatedchildtr').fadeIn();
        } else {
            jQuery('.ytrelatedchildtr').hide();
        }
    });



    var tags = jQuery('#ytexcludetags');

    if (jQuery('#ytexcludetags').is(":checked")) {
        jQuery('.ytexcludetagslisttr').show();
    } else {
        jQuery('.ytexcludetagslisttr').hide();
    }

    tags.change(function() {
        if (jQuery('#ytexcludetags').is(":checked")) {
            jQuery('.ytexcludetagslisttr').fadeIn();
        } else {
            jQuery('.ytexcludetagslisttr').hide();
        }
    });

    var tags2 = jQuery('#ytexcludetags2');

    if (jQuery('#ytexcludetags2').is(":checked")) {
        jQuery('.ytexcludetagslist2tr').show();
    } else {
        jQuery('.ytexcludetagslist2tr').hide();
    }

    tags2.change(function() {
        if (jQuery('#ytexcludetags2').is(":checked")) {
            jQuery('.ytexcludetagslist2tr').fadeIn();
        } else {
            jQuery('.ytexcludetagslist2tr').hide();
        }
    });

    var rcont = jQuery('#ytexcludecontent');

    if (jQuery('#ytexcludecontent').is(":checked")) {
        jQuery('.ytexcludecontentlisttr').show();
    } else {
        jQuery('.ytexcludecontentlisttr').hide();
    }

    rcont.change(function() {
        if (jQuery('#ytexcludecontent').is(":checked")) {
            jQuery('.ytexcludecontentlisttr').fadeIn();
        } else {
            jQuery('.ytexcludecontentlisttr').hide();
        }
    });

    var block1 = jQuery('#ytad1');

    if (jQuery('#ytad1').is(":checked")) {
        jQuery('.block1').show();
        if (jQuery('#ytad1set option:selected').val() == "РСЯ") {
            jQuery('.trrsa').fadeIn();
            jQuery('.trfox1').hide();
            jQuery('.trfox2').hide();
        }
        if (jQuery('#ytad1set option:selected').val() == "ADFOX") {
            jQuery('.trrsa').hide();
            jQuery('.trfox1').fadeIn();
            jQuery('.trfox2').fadeIn();
        }
    } else {
        jQuery('.block1').hide();
    }

    block1.change(function() {
        if (jQuery('#ytad1').is(":checked")) {
            jQuery('.block1').fadeIn();
            if (jQuery('#ytad1set option:selected').val() == "РСЯ") {
                jQuery('.trrsa').fadeIn();
                jQuery('.trfox1').hide();
                jQuery('.trfox2').hide();
            }
            if (jQuery('#ytad1set option:selected').val() == "ADFOX") {
                jQuery('.trrsa').hide();
                jQuery('.trfox1').fadeIn();
                jQuery('.trfox2').fadeIn();
            }
        } else {
            jQuery('.block1').hide();
        }
    });

    jQuery(document).on('change', '#ytad1set', function() {
        if (jQuery('#ytad1set option:selected').val() == "РСЯ") {
            jQuery('.trrsa').show();
            jQuery('.trfox1').hide();
            jQuery('.trfox2').hide();
        }
        if (jQuery('#ytad1set option:selected').val() == "ADFOX") {
            jQuery('.trrsa').hide();
            jQuery('.trfox1').show();
            jQuery('.trfox2').show();
        }
    });


    var block2 = jQuery('#ytad2');

    if (jQuery('#ytad2').is(":checked")) {
        jQuery('.block2').show();
        if (jQuery('#ytad2set option:selected').val() == "РСЯ") {
            jQuery('.trrsa2').fadeIn();
            jQuery('.trfox12').hide();
            jQuery('.trfox22').hide();
        }
        if (jQuery('#ytad2set option:selected').val() == "ADFOX") {
            jQuery('.trrsa2').hide();
            jQuery('.trfox12').fadeIn();
            jQuery('.trfox22').fadeIn();
        }
    } else {
        jQuery('.block2').hide();
    }

    block2.change(function() {
        if (jQuery('#ytad2').is(":checked")) {
            jQuery('.block2').fadeIn();
            if (jQuery('#ytad2set option:selected').val() == "РСЯ") {
                jQuery('.trrsa2').fadeIn();
                jQuery('.trfox12').hide();
                jQuery('.trfox22').hide();
            }
            if (jQuery('#ytad2set option:selected').val() == "ADFOX") {
                jQuery('.trrsa2').hide();
                jQuery('.trfox12').fadeIn();
                jQuery('.trfox22').fadeIn();
            }
        } else {
            jQuery('.block2').hide();
        }
    });

    jQuery(document).on('change', '#ytad2set', function() {
        if (jQuery('#ytad2set option:selected').val() == "РСЯ") {
            jQuery('.trrsa2').show();
            jQuery('.trfox12').hide();
            jQuery('.trfox22').hide();
        }
        if (jQuery('#ytad2set option:selected').val() == "ADFOX") {
            jQuery('.trrsa2').hide();
            jQuery('.trfox12').show();
            jQuery('.trfox22').show();
        }
    });

    var block3 = jQuery('#ytad3');

    if (jQuery('#ytad3').is(":checked")) {
        jQuery('.block3').show();
        if (jQuery('#ytad3set option:selected').val() == "РСЯ") {
            jQuery('.trrsa3').fadeIn();
            jQuery('.trfox13').hide();
            jQuery('.trfox23').hide();
        }
        if (jQuery('#ytad3set option:selected').val() == "ADFOX") {
            jQuery('.trrsa3').hide();
            jQuery('.trfox13').fadeIn();
            jQuery('.trfox23').fadeIn();
        }
    } else {
        jQuery('.block3').hide();
    }

    block3.change(function() {
        if (jQuery('#ytad3').is(":checked")) {
            jQuery('.block3').fadeIn();
            if (jQuery('#ytad3set option:selected').val() == "РСЯ") {
                jQuery('.trrsa3').fadeIn();
                jQuery('.trfox13').hide();
                jQuery('.trfox23').hide();
            }
            if (jQuery('#ytad3set option:selected').val() == "ADFOX") {
                jQuery('.trrsa3').hide();
                jQuery('.trfox13').fadeIn();
                jQuery('.trfox23').fadeIn();
            }
        } else {
            jQuery('.block3').hide();
        }
    });

    jQuery(document).on('change', '#ytad3set', function() {
        if (jQuery('#ytad3set option:selected').val() == "РСЯ") {
            jQuery('.trrsa3').show();
            jQuery('.trfox13').hide();
            jQuery('.trfox23').hide();
        }
        if (jQuery('#ytad3set option:selected').val() == "ADFOX") {
            jQuery('.trrsa3').hide();
            jQuery('.trfox13').show();
            jQuery('.trfox23').show();
        }
    });

    var imgselect = jQuery('#imgselect');
    if (jQuery('#imgselect option:selected').val() == "Указать автора") {
        jQuery('#ownname').fadeIn();
    } else {
        jQuery('#ownname').hide();
    }
    imgselect.change(function() {
        if (jQuery('#imgselect option:selected').val() == "Указать автора") {
            jQuery('#ownname').fadeIn();
        } else {
            jQuery('#ownname').hide();
        }
    });
    var auselect = jQuery('#ytauthorselect');
    if (jQuery('#ytauthorselect option:selected').val() == "Указать автора") {
        jQuery('#ownname2').fadeIn();
    } else {
        jQuery('#ownname2').hide();
    }
    auselect.change(function() {
        if (jQuery('#ytauthorselect option:selected').val() == "Указать автора") {
            jQuery('#ownname2').fadeIn();
        } else {
            jQuery('#ownname2').hide();
        }
    });
    var capalt = jQuery('#capalt');
    if (jQuery('#capalt option:selected').val() == "Использовать alt по возможности") {
        jQuery('#altimg').fadeIn();
    } else {
        jQuery('#altimg').hide();
    }
    capalt.change(function() {
        if (jQuery('#capalt option:selected').val() == "Использовать alt по возможности") {
            jQuery('#altimg').fadeIn();
        } else {
            jQuery('#altimg').hide();
        }
    });




    if (jQuery('#ytcounterselect option:selected').val() == "Яндекс.Метрика") {
        jQuery('.metrika').fadeIn();
    } else {
        jQuery('.metrika').hide();
    }
    if (jQuery('#ytcounterselect option:selected').val() == "LiveInternet") {
        jQuery('.liveinternet').fadeIn();
    } else {
        jQuery('.liveinternet').hide();
    }
    if (jQuery('#ytcounterselect option:selected').val() == "Google Analytics") {
        jQuery('.google').fadeIn();
    } else {
        jQuery('.google').hide();
    }
    if (jQuery('#ytcounterselect option:selected').val() == "Рейтинг Mail.RU") {
        jQuery('.mailru').fadeIn();
    } else {
        jQuery('.mailru').hide();
    }
    if (jQuery('#ytcounterselect option:selected').val() == "Rambler Топ-100") {
        jQuery('.rambler').fadeIn();
    } else {
        jQuery('.rambler').hide();
    }
    if (jQuery('#ytcounterselect option:selected').val() == "Mediascope (TNS)") {
        jQuery('.mediascope').fadeIn();
    } else {
        jQuery('.mediascope').hide();
    }

    var ytcounterselect = jQuery('#ytcounterselect');
    ytcounterselect.change(function() {
        if (jQuery('#ytcounterselect option:selected').val() == "Яндекс.Метрика") {
            jQuery('.metrika').fadeIn();
        } else {
            jQuery('.metrika').hide();
        }
        if (jQuery('#ytcounterselect option:selected').val() == "LiveInternet") {
            jQuery('.liveinternet').fadeIn();
        } else {
            jQuery('.liveinternet').hide();
        }
        if (jQuery('#ytcounterselect option:selected').val() == "Google Analytics") {
            jQuery('.google').fadeIn();
        } else {
            jQuery('.google').hide();
        }
        if (jQuery('#ytcounterselect option:selected').val() == "Рейтинг Mail.RU") {
            jQuery('.mailru').fadeIn();
        } else {
            jQuery('.mailru').hide();
        }
        if (jQuery('#ytcounterselect option:selected').val() == "Rambler Топ-100") {
            jQuery('.rambler').fadeIn();
        } else {
            jQuery('.rambler').hide();
        }
        if (jQuery('#ytcounterselect option:selected').val() == "Mediascope (TNS)") {
            jQuery('.mediascope').fadeIn();
        } else {
            jQuery('.mediascope').hide();
        }
    });

        if (jQuery('#ytqueryselect option:selected').val() == "Все таксономии, кроме исключенных") {
            jQuery('.yttaxlisttr').fadeIn();
            jQuery('#excludespan').fadeIn();
        } else {
            jQuery('.yttaxlisttr').hide();
            jQuery('#excludespan').hide();
        }
        if (jQuery('#ytqueryselect option:selected').val() == "Только указанные таксономии") {
            jQuery('.ytaddtaxlisttr').fadeIn();
            jQuery('#includespan').fadeIn();
        } else {
            jQuery('.ytaddtaxlisttr').hide();
            jQuery('#includespan').hide();
        }
    
    var ytqueryselect = jQuery('#ytqueryselect');
    ytqueryselect.change(function() {
        if (jQuery('#ytqueryselect option:selected').val() == "Все таксономии, кроме исключенных") {
            jQuery('.yttaxlisttr').fadeIn();
            jQuery('#excludespan').fadeIn();
        } else {
            jQuery('.yttaxlisttr').hide();
            jQuery('#excludespan').hide();
        }
        if (jQuery('#ytqueryselect option:selected').val() == "Только указанные таксономии") {
            jQuery('.ytaddtaxlisttr').fadeIn();
            jQuery('#includespan').fadeIn();
        } else {
            jQuery('.ytaddtaxlisttr').hide();
            jQuery('#includespan').hide();
        }
    });


})