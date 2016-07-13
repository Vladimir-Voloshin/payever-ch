#Bs = require("backbone.babysitter");
#_ = require("underscore")
Backbone    = require("backbone")
Mn          = require("backbone.marionette")
#viewManager = require('./main.coffee')
router      = require('./router.coffee')

payever = Mn.Application.extend({
  root: '/'
});

payeverApp = new payever({
  container: '#appData'
});


payeverApp.addInitializer(() ->
  console.log('init')
)

payeverApp.start({init:'home'})