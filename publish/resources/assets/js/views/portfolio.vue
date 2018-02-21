<template>
	<div id="portfolio">
		<div v-for="(model, index) in models" class="portfolio_item hero" :model="model" :class="{ selected: selected == model.id }">

			<router-link :to="{ path: '/portfolio/' + model.id }" class="hero-body" @click.native="showPorfolioFiles(model.id)"  >
				<div class="container" :style="{ backgroundImage: 'url(' +  model.image_url + ')' }">

						<!--<img v-bind:src="model.image">-->
					<h1 class="title is-1 has-text-centered">
						{{ model.title }}
					</h1>
					<div class="hero-foot">
						<h1 class="show-more subtitle is-1 has-text-centered">
							Show more ...
						</h1>
					</div>
				</div>
			</router-link>

			<portfolio-detail class="portfolio-detail" v-if="fetched.indexOf(model.id)>-1" :id="model.id" :class="{ selected: selected == model.id }" >
				<p class="title is-3 has-text-centered">{{model.summary}}</p>
			</portfolio-detail>

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
			axios.get('/api/portfolio').then( response => this.models = response.data );
		},
		mounted(){
			this.selected = this.$route.params.id;
		},
		methods:{
			showPorfolioFiles(id){
				console.log('showPorfolioFiles');
				this.fetchChildData(id);
				this.toggleSelectDetail(id);
			},
			toggleSelectDetail(id){
				this.selected = this.selected == id ? null : id;
			},
			fetchChildData(id){
				if(this.fetched.indexOf(id)== -1)
					this.fetched.push(id);
			}
		},
		components:{
			'portfolio-detail':portfolioDetail,
		}
	};
</script>
