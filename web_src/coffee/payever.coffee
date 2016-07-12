$ = require("jquery");
Backbone = require("backbone");
#Bs = require("backbone.babysitter");
Mn = require("backbone.marionette");
_ = require("underscore");

app = new Backbone.Marionette.Application({
#  initialize:(
#    console.log(this)
#  )
})

AlbumsCollection = new Backbone.Collection
AlbumsCollection.url = '/albums'
AlbumsCollection.fetch()

Album = Mn.ItemView.extend(
  tagName:  'li',
  template: _.template('<%- albumName %> &mdash; <%- id %>')
)

AlbumsList = Mn.CollectionView.extend({
  el: '#albums',
  tagName: 'ul',
  childView: Album
})

albums = new AlbumsList(
  collection: AlbumsCollection
)
  
albums.render()