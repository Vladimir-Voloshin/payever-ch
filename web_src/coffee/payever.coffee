Backbone    = require("backbone")
Mn          = require("backbone.marionette")
router      = require('./router.coffee')

payever = Mn.Application.extend({});

payeverApp = new payever();

payeverApp.addInitializer(() ->
  appRouter = new router({pushState: true, initialData: {}})
  
  #router will not work without this line
  Backbone.history.start();
  appRouter.navigate('', {trigger: true})
)

payeverApp.start({})