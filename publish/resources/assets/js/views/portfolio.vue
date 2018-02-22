<template>
	<div id="portfolio">
		<div v-for="(model, index) in models" class="portfolio_item hero" :model="model">
			<div class="hero-body borderX-r">
				<div class="container borderX-g">

					<router-link :to="{ path: '/portfolio/' + model.id }" @click.native="fetchChildData(model.id)">
						<div class="portfolio-background" :style="{ backgroundImage: 'url(' +  model.image_url + ')' }">
							<h1 class="title is-1 has-text-centered">{{ model.title }}</h1>
							<h2 class="subtitle is-2 has-text-centered">Show more ...</h2>
						</div>
					</router-link>

					<div class="hero-foot portfolio-detail">
						<portfolio-detail class="" v-if="fetched.indexOf(model.id)>-1" :id="model.id">
							<p class="title is-3 has-text-centered">{{model.summary}}</p>
						</portfolio-detail>
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
			this.fetchChildData( this.$route.params.id );
			axios.get('/api/portfolio').then( response => this.models = response.data );
		},
		mounted(){
			//this.selected = this.$route.params.id;
			//console.log( 'ROUTE: ' + this.$route.params.id );
		},
		methods:{
			//showPorfolioFiles(id){
			//	console.log('showPorfolioFiles: '+id);
			//	this.fetchChildData(id);
			//	//this.toggleSelectDetail(id);
			//},
			//toggleSelectDetail(id){
			//	this.selected = this.selected == id ? null : id;
			//},
			fetchChildData(id){
				console.log('fetchChildData: '+id);

				if(this.fetched.indexOf(id)== -1)
					this.fetched.push(parseInt(id));
			}
		},
		components:{
			'portfolio-detail':portfolioDetail,
		}
	};
</script>
