layout   = require('./../../appLayout.coffee')
mainView = require('./views/mainView.coffee')

run = (albumId, page) -> (
  mainDataView = new mainView({'albumId':albumId, 'page':page})
  layout.getRegion('content').show(mainDataView)
) 

module.exports = {run:run}