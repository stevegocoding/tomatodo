/**
 * User: magkbdev
 * Date: 11/1/13
 * Time: 9:22 PM
 * To change this template use File | Settings | File Templates.
 */


define(['backbone'], function(Backbone) {

    /* Todo Model */
    var TodoModel = Backbone.Model.extend({

        urlRoot: 'index.php/api/todo_api/todo/id',

        defaults: {
            content: '',
            done: false
        },

        toggle: function() {
            this.save({
                done: !this.get('done')
            });
        }
    });

    return TodoModel;

});
