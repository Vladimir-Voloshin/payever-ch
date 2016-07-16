Backbone = require("backbone")
appConstants     = require('./../../../appConstants.coffee')

albumsCollection = Backbone.Collection.extend({
  url: appConstants.ALBUMS_LIST_DATA_URL
})

albums = new albumsCollection
albums.fetch()

module.exports = albums