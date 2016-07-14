#Bs = require("backbone.babysitter");
#_ = require("underscore")
Backbone    = require("backbone")
Mn          = require("backbone.marionette")
#viewManager = require('./main.coffee')
router      = require('./router.coffee')

payever = Mn.Application.extend({});

payeverApp = new payever({
  container: '#appData'
});

payeverApp.addInitializer(() ->
  appRouter = new router({pushState: true, initialData: {}})
  
  #router will not work without this line
  Backbone.history.start();
  appRouter.navigate('#albums/', {trigger: true})
)

payeverApp.start({})