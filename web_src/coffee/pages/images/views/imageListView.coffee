appConstants        = require('./../../../appConstants.coffee')
imageRow            = require('./imageRowView.coffee')
ImagesCollection    = require('./../collections/imagesCollection.coffee')
Mn                  = require("backbone.marionette")

itemsList = Mn.CollectionView.extend({
  collection: new ImagesCollection(),
  tagName: 'ul',
  initialize: (options) -> (
#    TODO: make setting of the url through method
    this.collection.url = appConstants.IMAGES_LIST_DATA_URL + this.options.albumId + '/page/' + this.options.page
    this.collection.fetch()
  ),
  childView: imageRow
})

module.exports = itemsList