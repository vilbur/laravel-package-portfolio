<template>
	<div class="columns is-centered is-multiline" >

		<div v-for="(portfolioItem, imageIndex) in portfolioItems" class="column is-6" >
			<div>{{portfolioItem.summary}}</div>

			<portfolio-file :portfolio_item_id="portfolioItem.id"></portfolio-file>

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