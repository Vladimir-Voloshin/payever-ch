layout   = require('./../../appLayout.coffee')
mainView = require('./views/mainView.coffee')

run = (albumId) -> (
  mainDataView = new mainView({albumId:albumId})
  layout.getRegion('content').show(mainDataView)
) 

module.exports = {run:run}