Mn = require("backbone.marionette")

RootView = Mn.LayoutView.extend({
  el: 'body',
  regions: {
    menu:    '#menu',
    content: '#content'
  },

#  initialize: () -> {
#    Radio.channel('root').comply('set:content',function(contentView) {
#      this.getRegion('content').show(contentView);
#    });
#  },

#onBeforeShow: function() {
#  this.getRegion('header').show(new HeaderView());
#this.getRegion('footer').show(new FooterView());
#this.getRegion('content').show(new IndexView());
#}

})

module.exports = new RootView()