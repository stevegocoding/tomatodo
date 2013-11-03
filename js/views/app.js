/**
 * User: magkbdev
 * Date: 11/1/13
 * Time: 10:52 PM
 * To change this template use File | Settings | File Templates.
 */

define(['underscore',
        'backbone',
        'collections/todos',
        'views/todo_view'],
    function(_, Backbone, TodoCollection, TodoView) {

        'use strict';

        var ENTER_KEY = 13;

        var AppView = Backbone.View.extend({

            /**
             * Bind the app view to an existing DOM element
             */
            el: '#tomatodo-app',

            events: {
                'keypress #new-todo':       'createOnEnter'
            },

            initialize: function() {

                this.todoCollection = new TodoCollection();

                this.$input = this.$('#new-todo');
                this.$footer = this.$('#footer');
                this.$main = this.$('#main');

                this.$todolist = this.$('#todo-list');

                this.listenTo(this.todoCollection, 'add', this.addOne);

                var self = this;
                var onSuccess = function() {
                    console.log(self.todoCollection.toJSON());
                };
                this.todoCollection.fetch({success: onSuccess});
            },

            addOne: function(todo) {
                var view = new TodoView({model: todo});
                this.$todolist.append(view.render().el);
            },

            /**
             * Generate the attributes for a new Todo item
             */
            newAttributes: function() {
                var next = this.todoCollection.nextOrder();
                return {
                    content: this.$input.val().trim(),
                    priority: next,
                    done: false
                };
            },

            createOnEnter: function(e) {
                if (e.which !== ENTER_KEY || !this.$input.val().trim()) {
                    return;
                }
                var newItem = this.newAttributes();
                this.todoCollection.create(newItem);
                this.$input.val('');
            }
        });

        return AppView;
    }
);