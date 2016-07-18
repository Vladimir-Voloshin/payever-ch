Mn = require("backbone.marionette")
_  = require("underscore")

albumRaw = Mn.ItemView.extend(
  tagName:  'li',
  template: _.template('<%- albumName %>'),
  triggers: {
    click: 'select:entry'
  }
)

module.exports = albumRaw