mainView = require('./views/mainView.coffee')

run = () -> (
  mainDataView = new mainView()
  mainDataView.render()
) 

module.exports = {run:run}