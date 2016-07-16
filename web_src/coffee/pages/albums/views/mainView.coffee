AlbumsCollection = require('./../collections/albumsCollection.coffee')
Mn = require("backbone.marionette")
_ = require("underscore")


mainView = Mn.CollectionView.extend({
  collection: AlbumsCollection,
  el: '#appData',
  tagName: 'ul',
  childView: albumRaw
})

albumRaw = Mn.ItemView.extend(
  tagName:  'li',
  template: _.template('<%- albumName %> &mdash; <%- id %>')
)

module.exports = mainView