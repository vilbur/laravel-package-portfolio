<template>
	<div>
		<div v-for="(model, index) in models" class="hero portfolio_item" :model="model" v-bind:class="{ selected: selected == model.id }" >
			<figure v-on:click="showPorfolioFiles(model.id)">
				<router-link :to="{ path: '/portfolio/' + model.id }" class="hero-bodyX shadow-inner">
					<img class="portfolio_img" v-bind:src="model.image">
					<h1 class="title is-1 has-text-centered centered">
						{{ model.title }}
					</h1>
					<h1 class="more title is-1 has-text-centered centered">
						Show more ...
					</h1>
				</router-link>
			</figure>
			<portfolio-detail v-if="fetched.indexOf(model.id)>-1" :id="model.id" >
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
				this.toggleShowDetail(id);
				this.fetchChildData(id);
			},
			toggleShowDetail(id){
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
