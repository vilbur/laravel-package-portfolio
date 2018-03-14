# Laravel package - portfolio<br>
* optimized for Vue.js & Bulma

## Dependencies
[vue-router](https://github.com/vuejs/vue-router)<br>
[vue-gallery](https://github.com/RobinCK/vue-gallery)<br>
[vue-scrollto](https://github.com/rigor789/vue-scrollto)<br>


### Install
``` bash
composer require vilbur/portfolio @dev
```

### Publish files
``` bash
php artisan vendor:publish --tag="vilbur/portfolio'"
```

### app.js
``` javascript

// import vilbur-portfolio view
const Portfolio	= () => import('./portfolio/views/portfolio.vue');

// routes for vue-router
const router = new VueRouter({
	routes:{
		path:	'/portfolio/:portfolio_slug?',
		name:	'portfolio',
		component:	Portfolio
	},
});
```

### app.scss
``` scss
@import 'portfolio/portfolio.scss';
```

