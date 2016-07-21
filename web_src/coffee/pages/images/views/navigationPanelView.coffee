_                   = require("underscore")
Mn                  = require("backbone.marionette")
navigationPanelView = require("./../templates/navigationPanelView.coffee")

navigationPanel = Mn.ItemView.extend({
  template: _.template(navigationPanelView)
})

module.exports = navigationPanel