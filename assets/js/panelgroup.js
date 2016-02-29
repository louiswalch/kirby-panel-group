
// Global debug logger
var log = function(s){
  if(debug) {
    console.log(s);
  }
};


(function($) {

    // Cookie to keep track of last opened panel
    var cookie_name = 'panelgroup' + window.location.pathname;

    $.fn.panelgroup = function() {

        var panel = $(this).closest('.field-group');

        // Some panels are just grouped fields
        if (!panel.hasClass('is-accordian')) return false;

        panel.find('H2').click(function() {
            panel.toggleClass('open');
            sessionStorage[cookie_name] = panel.attr('groupname');
        });

        // If this is last opened tab then let's leave it open.
        // Otherwise remove the open class. This class needs to be there initially to get Kirby to apply input scripts.
        if (sessionStorage[cookie_name] == panel.attr('groupname')) {
            panel.addClass('open');
        } else {
            setTimeout(function(){
                panel.removeClass('open');
            }, 6);
        }

    };


})(jQuery);