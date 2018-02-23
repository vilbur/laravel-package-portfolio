<template>
	<div id="portfolio">
		<div v-for="(model, index) in models" class="portfolio_item hero" :model="model">
			<div class="hero-body borderX-r">
				<div class="container borderX-g">

					<router-link :to="{ path: '/portfolio/' + model.slug }" @click.native="fetchChildData(model.slug)">
						<div class="portfolio-background" :style="{ backgroundImage: 'url(' +  model.image_url + ')' }">
							<h1 class="title is-1 has-text-centered">{{ model.title }}</h1>
							<h2 class="subtitle is-2 has-text-centered">Show more ...</h2>
						</div>
					</router-link>

					<div class="hero-foot portfolio-detail">
						<div class="section borderX-r">
							<p   class="title is-3 has-text-centered borderX"	v-if="model.summary">{{model.summary}}</p>
							<div class="column is-6 has-text-left borderX-b" v-if="model.description" v-html="model.description"></div>
						</div>

						<portfolio-detail class="" v-if="fetched.indexOf(model.slug)>-1" :slug="model.slug"></portfolio-detail>
					</div>

				</div>
			</div>
		</div>
	</div>

</template>

<script>
	import portfolioDetail from '../components/portfolio-detail';

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
			this.fetchChildData( this.$route.params.slug );
			axios.get('/api/portfolio').then( response => this.models = response.data );
		},
		mounted(){

		},
		methods:{

			fetchChildData(slug){
				console.log('fetchChildData: '+slug);

				if(this.fetched.indexOf(slug)== -1)
					this.fetched.push(slug);
			}
		},
		components:{
			'portfolio-detail':portfolioDetail,
		}
	};
</script>
