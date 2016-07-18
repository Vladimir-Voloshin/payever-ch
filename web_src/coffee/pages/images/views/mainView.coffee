appConstants     = require('./../../../appConstants.coffee')
imageRow         = require('./imageRowView.coffee')
ImagesCollection = require('./../collections/imagesCollection.coffee')
Mn               = require("backbone.marionette")

mainView = Mn.CollectionView.extend({
  collection: new ImagesCollection(),
  el: '#appData',
  tagName: 'ul',
  initialize: () -> (
    this.collection.url = appConstants.IMAGES_LIST_DATA_URL + this.options.albumId
    this.collection.fetch()
  ),
  childView: imageRow
})

module.exports = mainView