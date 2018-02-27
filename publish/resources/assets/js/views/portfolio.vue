<template>
	<div id="portfolio">
		<div v-for="(model, index) in models" class="portfolio_item hero" :model="model">
			<div class="hero-body borderX-r">
				<div class="container borderX-g">

					<router-link :to="{ path: '/portfolio/' + model.slug }" :id="'link-'+model.slug" @click.native="fetchChildData(model.slug)">
						<div class="portfolio-background" :style="{ backgroundImage: 'url(' +  model.image_url + ')' }">
							<h2 class="title is-1 ">{{ model.title }}</h2>
							<!--<h2 class="subtitle is-2 has-text-centered">Show more ...</h2>-->
						</div>
					</router-link>

					<div class="hero-foot portfolio-detail">

						<p   class="title is-3 has-text-centeredX borderX"	v-if="model.summary">{{model.summary}}</p>
						<div class="columns">
							<div class="column is-6" v-if="model.description">

								<div class="column is-6X has-text-left borderX-b"  v-html="model.description"></div>

							</div>
							<div class="column">

								<portfolio-item class="" v-if="fetched.indexOf(model.slug)>-1" :portfolio_slug="model.slug"></portfolio-item>
							</div>
						</div>

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
					VueScrollTo.scrollTo( "#link-"+portfolio_slug, 500, {easing: 'ease-in', offset: -80});
				}, 100);
			}
		},
		components:{
			'portfolio-item':portfolioItem,
		}
	};
</script>
