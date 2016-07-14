Backbone    = require('backbone');
viewManager = require('./main.coffee');
Mn          = require("backbone.marionette")

router = Mn.AppRouter.extend({
  appRoutes: {
    'albums/': 'albums'
  },
  
  controller: {
    albums: () ->
      require('./pages/albums/app.coffee').run(viewManager)
      
    albumImages: () ->
      require('./pages/albums/app.coffee').run(viewManager)
  }
})

module.exports = router