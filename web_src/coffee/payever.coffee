###
app = new Mn.Application

app.on("start") -> 
  Backbone.history.start
  alert "started"
app.start

###
