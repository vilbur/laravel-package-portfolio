# Laravel package - portfolio<br>    
* optimized for Vue.js & Bulma    

## Dependencies    
[vue-router](https://github.com/vuejs/vue-router)    
[vue-gallery](https://github.com/RobinCK/vue-gallery)    
[vue-scrollto](https://github.com/rigor789/vue-scrollto)  
[disable-scroll](https://www.npmjs.com/package/disable-scroll)  


### Install    
``` bash    
composer require vilbur/portfolio @dev    
```    

### Install dependecies    
``` bash    
npm install vue-gallery --save &&npm install --save vue-scrollto    
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
	routes:    
	{    
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

    