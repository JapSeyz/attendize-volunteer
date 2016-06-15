var Vue = require('vue');

// Setup Directives
Vue.directive('city', function (value) {
    var self = this;
    if (typeof window.cities === 'undefined') {
        window.cities = [];
    }

    if (value.length == 4) {
        let $el = $(self.el);

        if (value in window.cities) {

            if ($el.is("input")) {
                $el.val(window.cities[value])
            } else {
                $el.html(window.cities[value]);
            }
        } else {
            $.get('/api/volunteer/zip/' + value, function (msg) {
                window.cities[value] = msg;

                if ($el.is("input")) {
                    $el.val(window.cities[value])
                } else {
                    $el.html(window.cities[value]);
                }
            });
        }
    }

    return value;
});

// Main Vue App
new Vue({
    el: 'body',

    data: {
        zip: '',
    },
});