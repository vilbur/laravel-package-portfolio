<template>
	<div id="portfolio">
		<div v-for="(model, index) in models" class="portfolio_item hero" :id="'hero-'+model.slug"  :model="model">
			<div class="hero-body border-OFFX-r">
				<div class="container border-OFFX-g">

					<router-link :to="{ path: '/portfolio/' + model.slug }" @click.native="fetchChildData(model.slug)">
						<div class="portfolio-background" :style="{ backgroundImage: 'url(' +  model.image_url + ')' }">
							<h2 class="title is-1 ">{{ model.title }}</h2>
						</div>
					</router-link>

					<div class="hero-foot portfolio-detail border-OFF-r">
						<transition name="show">
							<portfolio-item v-if="show==model.slug || show=='all'" :portfolio_slug="model.slug"></portfolio-item>
						</transition>

					</div>

				</div>
			</div>
		</div>

		<footer-component></footer-component>

	</div>

</template>


<style>

	.show-enter,
	.show-leave-to { max-height: 1px; opacity: 0  }

	.show-leave,
	.show-enter-to { max-height: 4096px; opacity: 1  }

	.show-enter-active,
	.show-leave-active { transition: 600ms ease-in}

	/*.show-enter-active { transition:  500ms }*/
	/*.show-leave-active { transition:  1500ms }*/
</style>


<script>
	import portfolioItem from '../components/portfolio-item';
	import VueScrollTo from 'vue-scrollto';

	export default {

		data(){
			return {
				show:	null,
				//shown:	null,
				models:	[],
				fetched:	[],
			};
		},
		created(){
			this.fetchChildData( this.$route.params.portfolio_slug );
			axios.get('/api/get-portfolio').then( response => this.models = response.data );
		},
		mounted(){

		},
		methods:{

			fetchChildData(portfolio_slug){
				console.log('fetchChildData: '+portfolio_slug);

				this.show = portfolio_slug;
				//this.show = 'all';
				//if(this.fetched.indexOf(portfolio_slug)== -1)
				//	this.fetched.push(portfolio_slug);

				setTimeout( function(){
					VueScrollTo.scrollTo( "#hero-"+portfolio_slug, 500, { easing: 'ease-in', offset: -20});
					//VueScrollTo.scrollTo( "#hero-"+portfolio_slug, 2000, {easing: 'ease-in'});
				}, 1000);
			}
		},
		components:{
			'portfolio-item':portfolioItem,
		}
	};
</script>
