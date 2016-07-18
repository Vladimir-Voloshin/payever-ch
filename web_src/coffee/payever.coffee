Backbone    = require("backbone")
Mn          = require("backbone.marionette")
router      = require('./router.coffee')

payever = Mn.Application.extend({});

payeverApp = new payever({
  router: new router({pushState: true})
})

payeverApp.addInitializer(() ->
  
  #router will not work without this line
  Backbone.history.start();
  this.router.navigate('', {trigger: true})
)

payeverApp.start({})