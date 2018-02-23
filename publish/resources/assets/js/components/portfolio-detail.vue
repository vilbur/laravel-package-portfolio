<template>
	<div class="columns is-centered is-multiline" >
		<gallery :id="'blueimp-gallery-' + slug" :images="images" :index="index" @close="index = null"></gallery>

		<div v-for="(image, imageIndex) in images" class="column is-3" >
			<div class="image"
				:key="imageIndex"
				@click="index = imageIndex"
				:style="{ backgroundImage: 'url(' + image + ')' }"
			></div>
		</div>

	</div>
</template>

<script>

	export default {

		props: ['slug'],
		data(){
			return {
				//selected:	null,
				portfolioFiles:	[],
				images:	[],
				index:	null
			};
		},
		created(){
			axios.get('/api/portfolio/' + this.slug).then( response => {
				this.portfolioFiles = response.data;
				this.images = this.portfolioFiles.map(function(model){
					return model.image_url;
				});
			});
		},
		mounted(){
			this.selected = this.$route.params.slug == this.slug;
		},

	};
</script>