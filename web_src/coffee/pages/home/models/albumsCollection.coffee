Backbone = require("backbone")
Mn = require("backbone.marionette")
_ = require("underscore")

mainView = Mn.View.extend({
  childView: albumsList
})

albumsCollection: Backbone.Collection.extend({
  url: '/albums'
}),

albumsList: Mn.CollectionView.extend({
  collection: this.albumsCollection,
  el: '#albums',
  tagName: 'ul',
  childView: this.albumRaw
}),

albumRaw: Mn.ItemView.extend(
  tagName:  'li',
  template: _.template('<%- albumName %> &mdash; <%- id %>')
)

module.exports = mainView