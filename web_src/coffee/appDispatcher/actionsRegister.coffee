Backbone   = require("backbone")
dispatcher = require("./appDispatcher.coffee")

dispatcher.on('selectAlbum', (albumId) -> (
  Backbone.history.navigate('/album/' + albumId + '/', {trigger: true})
))

dispatcher.on('moveToPage', (albumId, page) -> (
  Backbone.history.navigate('/album/' + albumId + '/page/' + page + '/', {trigger: true})
))

module.exports = {}