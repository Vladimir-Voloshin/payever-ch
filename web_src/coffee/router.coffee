Backbone    = require('backbone');
viewManager = require('./main.coffee');

router = Backbone.Router.extend({
  routes: {
    '': 'home',
    'inbox': 'inbox',
    'inbox/compose': 'inboxCompose',
    'contacts': 'contacts',
    'tasks': 'tasks'
  },
  
  home: () -> require('./pages/home/app.coffee').run(viewManager)

#  inbox: function () {
#    require('./../apps/inbox/app').run(viewManager);
#  },
#  
#  inboxCompose: function () {
#    require('./../apps/inbox/subapps/compose/app').run(viewManager);
#  },
#  
#  contacts: function () {
#    require('./../apps/contacts/app').run(viewManager);
#  },
#  
#  tasks: function () {
#    require('./../apps/tasks/app').run(viewManager);
#  }
})

module.exports = router