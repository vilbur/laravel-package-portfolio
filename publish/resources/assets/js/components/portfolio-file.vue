<template>
	<div class="columns is-centered is-multiline" >
		<gallery :id="'blueimp-gallery-' + portfolio_item_id" :images="images" :index="index" @close="index = null" :options="{youTubeVideoIdProperty: 'video', youTubePlayerVars: {rel:0}, youTubeClickToPlay: false}"></gallery>

		<div v-for="(image, imageIndex) in images" class="column is-6" >
			<div class="image"
				:key="imageIndex"
				@click="index = imageIndex"
				:style="{ backgroundImage: 'url(' + image.href + ')' }"
			></div>
		</div>

	</div>
</template>

<script>

	export default {

		props: ['portfolio_item_id'],
		data(){
			return {
				//selected:	null,
				portfolioFiles:	[],
				images:	[],
				index:	null
			};
		},
		created(){
			axios.get('/api/get-portfolio-files/' + this.portfolio_item_id).then( response => {
				this.portfolioFiles = response.data;
				this.images = this.portfolioFiles.map(function(model){
					return {
						title:	model.title,
						description:	model.description,
						type:	'text/html',
						href:	model.image_url,
						video:	model.url,

					};
				});
			});
		},
		mounted(){
			this.selected = this.$route.params.portfolio_item_id == this.portfolio_item_id;
		},

	};
</script>