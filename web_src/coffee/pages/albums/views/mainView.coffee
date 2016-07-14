AlbumsCollection = require('./../models/albumsCollection.coffee')
Mn = require("backbone.marionette")
_ = require("underscore")

mainView = Mn.View.extend({
  childView: albumsList
})

albumsList = Mn.CollectionView.extend({
  collection: new AlbumsCollection(),
  el: '#albums',
  modelEvents: {
    fetch: 'render'
  },
  tagName: 'ul',
  childView: albumRaw
})

albumRaw = Mn.ItemView.extend(
  tagName:  'li',
  template: _.template('<%- albumName %> &mdash; <%- id %>')
)

module.exports = mainView