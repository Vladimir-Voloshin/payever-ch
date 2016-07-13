#AlbumsCollection = require('./models/albumsCollection');
#mainView = require('./views/mainView');

run = () -> (
  console.log('some output')
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
module.exports = run