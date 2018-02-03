#
Package portfolio.<br>


### \resources\assets\js\app.js
``` javascript
import VueGallery from 'vue-gallery';
window.Vue.component('gallery', VueGallery);
```

### \resources\assets\js\routes.js
``` javascript
const Portfolio	= () => import('./views/portfolio/portfolio.vue');
```

### Dependency
[vue-gallery](https://github.com/RobinCK/vue-gallery)  