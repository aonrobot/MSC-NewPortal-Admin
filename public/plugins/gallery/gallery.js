(function() {
  var support = { transitions: Modernizr.csstransitions },
    // transition end event name
    transEndEventNames = { 'WebkitTransition': 'webkitTransitionEnd', 'MozTransition': 'transitionend', 'OTransition': 'oTransitionEnd', 'msTransition': 'MSTransitionEnd', 'transition': 'transitionend' },
    transEndEventName = transEndEventNames[ Modernizr.prefixed( 'transition' ) ],
    onEndTransition = function( el, callback ) {
      var onEndCallbackFn = function( ev ) {
        if( support.transitions ) {
          if( ev.target != this ) return;
          this.removeEventListener( transEndEventName, onEndCallbackFn );
        }
        if( callback && typeof callback === 'function' ) { callback.call(this); }
      };
      if( support.transitions ) {
        el.addEventListener( transEndEventName, onEndCallbackFn );
      }
      else {
        onEndCallbackFn();
      }
    };

  new GridFx(document.querySelector('.grid'), {
    imgPosition : {
      x : 1,
      y : 0.75
    },
    pagemargin : 50,
    onOpenItem : function(instance, item) {
      instance.items.forEach(function(el) {
        if(item != el) {
          var delay = Math.floor(Math.random() * 150);
          el.style.WebkitTransition = 'opacity .4s ' + delay + 'ms cubic-bezier(.7,0,.3,1), -webkit-transform .4s ' + delay + 'ms cubic-bezier(.7,0,.3,1)';
          el.style.transition = 'opacity .4s ' + delay + 'ms cubic-bezier(.7,0,.3,1), transform .4s ' + delay + 'ms cubic-bezier(.7,0,.3,1)';

          el.style.WebkitTransform = 'translate3d(0,400px,0)';
          el.style.transform = 'translate3d(0,400px,0)';
          el.style.opacity = 0;
        }
      });
    },
    onCloseItem : function(instance, item) {
      instance.items.forEach(function(el) {
        if(item != el) {
          el.style.WebkitTransition = 'opacity .3s, -webkit-transform .3s';
          el.style.transition = 'opacity .3s, transform .3s';

          el.style.WebkitTransform = 'translate3d(0,0,0)';
          el.style.transform = 'translate3d(0,0,0)';
          el.style.opacity = 1;

          onEndTransition(el, function() {
            el.style.transition = 'none';
            el.style.WebkitTransform = 'none';
          });
        }
      });
    }
  });
})();
