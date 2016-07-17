albumRaw = require('./albumRawView.coffee')
AlbumsCollection = require('./../collections/albumsCollection.coffee')
Backbone    = require("backbone")
Mn = require("backbone.marionette")

mainView = Mn.CollectionView.extend({
  collection: AlbumsCollection,
  el: '#appData',
  tagName: 'ul',
  childView: albumRaw,
  onChildviewSelectEntry: (child, options) -> (
    #    this.triggerMethod('select:entry', child.model);
    Backbone.history.navigate('album/' + child.model.attributes.id)
  )
})

module.exports = mainView