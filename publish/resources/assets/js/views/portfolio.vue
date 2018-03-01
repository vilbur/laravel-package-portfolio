<template>
	<div id="portfolio">
		<div v-for="(model, index) in models" class="portfolio_item hero" :id="'hero-'+model.slug"  :model="model">
			<div class="hero-body border-OFFX-r">
				<div class="container border-OFFX-g">

					<router-link :to="{ path: '/portfolio/' + model.slug }" @click.native="fetchChildData(model.slug)">
						<div class="portfolio-background" :style="{ backgroundImage: 'url(' +  model.image_url + ')' }">
							<h2 class="title is-1 ">{{ model.title }}</h2>
							<!--<h2 class="subtitle is-2 has-text-centered">Show more ...</h2>-->
						</div>
					</router-link>

					<div class="hero-foot portfolio-detail border-OFF-r">

						<p   class="title is-3 has-text-centeredX border-OFF" v-if="model.summary">{{model.summary}}</p>
						<div class="column is-6X has-text-left border-OFF-b"  v-if="model.description" v-html="model.description"></div>

						<portfolio-item v-if="fetched.indexOf(model.slug)>-1" :portfolio_slug="model.slug"></portfolio-item>

					</div>

				</div>
			</div>
		</div>
	</div>

</template>

<script>
	import portfolioItem from '../components/portfolio-item';
	import VueScrollTo from 'vue-scrollto';

	export default {

		data(){
			return {
				selected:	null,
				shown:	null,
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
				if(this.fetched.indexOf(portfolio_slug)== -1)
					this.fetched.push(portfolio_slug);

				setTimeout( function(){
					VueScrollTo.scrollTo( "#hero-"+portfolio_slug, 500, {easing: 'ease-in', offset: -20});
					//VueScrollTo.scrollTo( "#hero-"+portfolio_slug, 2000, {easing: 'ease-in'});
				}, 300);
			}
		},
		components:{
			'portfolio-item':portfolioItem,
		}
	};
</script>
