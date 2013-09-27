// Avoid `console` errors in browsers that lack a console.
(function(){var e,t=function(){},n=["assert","clear","count","debug","dir","dirxml","error","exception","group","groupCollapsed","groupEnd","info","log","markTimeline","profile","profileEnd","table","time","timeEnd","timeStamp","trace","warn"],r=n.length,i=window.console=window.console||{};while(r--){e=n[r];i[e]||(i[e]=t)}})();+function(e){"use strict";var t=function(n,r){this.options=e.extend({},t.DEFAULTS,r);this.$window=e(window).on("scroll.bs.affix.data-api",e.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",e.proxy(this.checkPositionWithEventLoop,this));this.$element=e(n);this.affixed=this.unpin=null;this.checkPosition()};t.RESET="affix affix-top affix-bottom";t.DEFAULTS={offset:0};t.prototype.checkPositionWithEventLoop=function(){setTimeout(e.proxy(this.checkPosition,this),1)};t.prototype.checkPosition=function(){if(!this.$element.is(":visible"))return;var n=e(document).height(),r=this.$window.scrollTop(),i=this.$element.offset(),s=this.options.offset,o=s.top,u=s.bottom;typeof s!="object"&&(u=o=s);typeof o=="function"&&(o=s.top());typeof u=="function"&&(u=s.bottom());var a=this.unpin!=null&&r+this.unpin<=i.top?!1:u!=null&&i.top+this.$element.height()>=n-u?"bottom":o!=null&&r<=o?"top":!1;if(this.affixed===a)return;this.unpin&&this.$element.css("top","");this.affixed=a;this.unpin=a=="bottom"?i.top-r:null;this.$element.removeClass(t.RESET).addClass("affix"+(a?"-"+a:""));a=="bottom"&&this.$element.offset({top:document.body.offsetHeight-u-this.$element.height()})};var n=e.fn.affix;e.fn.affix=function(n){return this.each(function(){var r=e(this),i=r.data("bs.affix"),s=typeof n=="object"&&n;i||r.data("bs.affix",i=new t(this,s));typeof n=="string"&&i[n]()})};e.fn.affix.Constructor=t;e.fn.affix.noConflict=function(){e.fn.affix=n;return this};e(window).on("load",function(){e('[data-spy="affix"]').each(function(){var t=e(this),n=t.data();n.offset=n.offset||{};n.offsetBottom&&(n.offset.bottom=n.offsetBottom);n.offsetTop&&(n.offset.top=n.offsetTop);t.affix(n)})})}(window.jQuery);