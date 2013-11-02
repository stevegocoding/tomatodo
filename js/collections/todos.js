/**
 * User: magkbdev
 * Date: 11/2/13
 * Time: 1:53 PM
 * To change this template use File | Settings | File Templates.
 */


define(['underscore', 'backbone', 'models/todo'],
    function(_, Backbone, TodoModel) {

        'use strict';

        var TodosCollection = Backbone.Collection.extend({

            model: TodoModel,

            url: 'index.php/api/todo_api/todos/format/json',

            doneItems: function() {
                return this.filter(function(todo) {
                    return todo.get('done');
                });
            },

            remainingItems: function() {
                return this.without.apply(this, this.doneItems());
            },

            /**
             * The todo items are sorted by their priority
             */
            comparator: function(todo) {
                return todo.get('priority');
            }
        });

        return TodosCollection;
    }
);
