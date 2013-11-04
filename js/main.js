/**
 * User: magkbdev
 * Date: 11/1/13
 * Time: 9:23 PM
 * To change this template use File | Settings | File Templates.
 */

require.config({
    baseUrl: "js/",
    paths: {
        'text' : 'lib/text',
        'jquery': 'lib/jquery-min',
        'jquery-ui': 'lib/jquery-ui-min',
        'underscore': 'lib/underscore-min',
        'backbone': 'lib/backbone-min'
    },
    shim: {

        underscore: {
            exports: '_'
        },
        backbone: {
            deps: [
                'underscore',
                'jquery'
            ],
            exports: 'Backbone'
        }
    }
});


require(['jquery', 'backbone', 'views/app'], function($, Backbone, AppView) {

    $(function() {
        new AppView();
    });

});