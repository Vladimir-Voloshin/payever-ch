appConstants        = require('./../../../appConstants.coffee')
imageRow            = require('./imageRowView.coffee')
ImagesCollection    = require('./../collections/imagesCollection.coffee')
Mn                  = require("backbone.marionette")

itemsList = Mn.CollectionView.extend({
  collection: new ImagesCollection(),
  tagName: 'ul',
  initialize: (options) -> (
    console.log(options)
    this.collection.url = appConstants.IMAGES_LIST_DATA_URL + this.options.albumId + 
    this.collection.fetch()
  ),
  childView: imageRow
})

module.exports = itemsList