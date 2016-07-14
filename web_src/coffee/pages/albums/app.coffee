mainView         = require('./views/mainView.coffee')


run = (viewManager) -> (
  albumsView = new mainView()
  albumsView.render()
) 

###
return {
    run: function(viewManager) {
      var contactsCollection = new ContactsCollection();
      contactsCollection.fetch({
        success: function (contactsCollection) {
          var view = new MainView({collection: contactsCollection});
          viewManager.show(view);
        }
      });
    }
};
###
module.exports = {run:run}