Backbone    = require("backbone")
Mn          = require("backbone.marionette")
router      = require('./router.coffee')
layout      = require('./appLayout.coffee')

payever = Mn.Application.extend({});

payeverApp = new payever({
  router: new router({pushState: true})
})

payeverApp.addInitializer(() ->
  Backbone.history.start();
  require('./appDispatcher/actionsRegister.coffee')
  this.router.navigate('', {trigger:true})
)

payeverApp.start({})