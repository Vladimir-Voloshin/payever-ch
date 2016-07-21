_                   = require("underscore")
dispatcher          = require("./../../../appDispatcher/appDispatcher.coffee")
Mn                  = require("backbone.marionette")
navigationPanelView = require("./../templates/navigationPanelView.coffee")

navigationPanel = Mn.ItemView.extend({
  events: {
    'click #scrollBack': 'scrollBack',
    'click #scrollForward': 'scrollForward'
  },
  serializeData: () -> ({
    page: this.options.page
  })
  template: _.template(navigationPanelView),
  scrollBack: () -> (
    if(this.options.page == 1)
      return
    dispatcher.trigger('showAlbumImages', {'albumId':this.options.albumId, 'page':parseInt(this.options.page)-1})
  ),
  scrollForward: () -> (
    dispatcher.trigger('showAlbumImages', {'albumId':this.options.albumId, 'page':parseInt(this.options.page)+1})
  )
})

module.exports = navigationPanel