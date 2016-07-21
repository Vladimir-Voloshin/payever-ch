Mn       = require("backbone.marionette")
_        = require("underscore")

albumRaw = Mn.ItemView.extend(
  tagName:  'li',
  template: _.template('<img src="./<%- fileName %>" /> <%- fileName %> &mdash; <%- id %>')
)

module.exports = albumRaw