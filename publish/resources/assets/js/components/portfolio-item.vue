<template>
	<div id="portfolio-item" class="columns is-centered is-multiline" >

		<div v-for="(item, imageIndex) in portfolioItems" class="column is-12 border-OFF-g" >

			<div class="portfolio-item columns">
				<div v-if="hasText(item)" class="column is-4">
					<h3 v-if="item.title" class="title is-3">{{ item.title }}</h3>
					<h4 v-if="item.summary" class="subtitle is-4">{{ item.summary }}</h4>
					<div v-if="item.description" v-html="item.description"></div>
				</div>

				<div v-if="hasText(item)" class="column is-8">
					<portfolio-file  :portfolio_item_id="item.id"></portfolio-file>
				</div>
				<div v-else class="column is-12">
					<portfolio-file  :portfolio_item_id="item.id"></portfolio-file>
				</div>

			</div>

		</div>


	</div>
</template>

<script>
	import portfolioFile from './portfolio-file';

	export default {

		props: ['portfolio_slug'],
		data(){
			return {
				//selected:	null,
				portfolioItems:	[],
				//index:	null
			};
		},
		methods:{
			hasText(item){
				return !item.title && !item.summary && !item.description ? false : true;
			}
		},
		created(){
			axios.get('/api/get-portfolio-items/' + this.portfolio_slug).then( response => {
				this.portfolioItems = response.data;
			});
		},
		mounted(){
			this.selected = this.$route.params.portfolio_slug == this.portfolio_slug;
		},
		components:{
			'portfolio-file':portfolioFile,
		}

	};
</script>


