albumRaw         = require('./albumRowView.coffee')
AlbumsCollection = require('./../collections/albumsCollection.coffee')
dispatcher       = require("./../../../appDispatcher/appDispatcher.coffee")
Mn               = require('backbone.marionette')

mainView = Mn.CollectionView.extend({
  collection: AlbumsCollection,
#  el: '#appData',
  tagName: 'ul',
  childView: albumRaw,
  onChildviewSelectEntry: (child, options) -> (
    dispatcher.trigger('selectAlbum', child.model.attributes.id)
  )
})

module.exports = mainView