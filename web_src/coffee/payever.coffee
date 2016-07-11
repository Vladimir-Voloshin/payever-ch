$ = require("jquery");
Backbone = require("backbone");
#Bs = require("backbone.babysitter");
Mn = require("backbone.marionette");
_ = require("underscore");

app = new Backbone.Marionette.Application


Album = Mn.LayoutView.extend(
  tagName:  'li',
  template: _.template('<%- albumName %> &mdash; <%- id %>')
)

AlbumsList = Mn.CollectionView.extend({
  el: '#albums',
  tagName: 'ul',
  childView: Album
})

albums = new AlbumsList(
  collection:
    new Backbone.Collection([
      {assignee: 'Scott', text: 'Write a book about Marionette'},
      {assignee: 'Andrew', text: 'Do some coding'}
    ])
)
  
albums.render()