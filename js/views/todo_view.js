/**
 * User: magkbdev
 * Date: 11/2/13
 * Time: 12:28 PM
 * To change this template use File | Settings | File Templates.
 */

define(['underscore',
        'backbone',
        'text!templates/todos.html'],
    function(_, Backbone, todosTemplate) {

        'use strict';

        var TodoView = Backbone.View.extend({

            tagName: 'li',

            template: _.template(todosTemplate),

            events: {
                'click .toggle': 'toggleDone',
                'click label': 'edit',
                'blur .edit': 'close'
            },

            initialize: function() {
                this.listenTo(this.model, 'change', this.render);
                this.listenTo(this.model, 'destroy', this.remove);
            },

            render: function() {
                this.$el.html(this.template(this.model.toJSON()));
                this.$el.toggleClass('done', this.model.get('done'));

                // this.toggleVisible();
                this.$input = this.$('.edit');
                return this;
            },

            togglePinned: function() {

            },

            toggleDone: function() {
                this.model.toggle();
            },

            /**
             * Switch to 'editing' mode, displaying the input filed
             */
            edit: function() {
                this.$el.addClass('editing');
                this.$input.focus();
            },


            /**
             * Close the 'editing' mode, saving the changes to the model
             */
            close: function() {
                var value = this.$input.val();
                var trimmedValue = value.trim();

                if (trimmedValue) {
                    this.model.save({content: trimmedValue});

                    if (value !== trimmedValue) {
                        // Model values changes consisting of whitespaces only are not causing change to be triggered
                        // Therefore we've to compare untrimmed version with a trimmed one to chech whether anything changed
                        // And if yes, we've to trigger change event ourselves
                        this.model.trigger('changed');
                    }
                }
                else {
                    this.clear();
                }

                this.$el.removeClass('editing');
            },

            clear: function() {
                this.model.destroy();
            }
        });

        return TodoView;
    }
);
