mainView = require('./views/mainView.coffee')

run = (albumId) -> (
  mainDataView = new mainView({albumId:albumId})
  mainDataView.render()
) 

module.exports = {run:run}