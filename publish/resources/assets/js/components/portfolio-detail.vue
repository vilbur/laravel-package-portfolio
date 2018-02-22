<template>
	<div class="columns is-centered is-multiline" >
		<slot></slot>
		<!--<div class="portfolio-detail columns is-centered is-multiline" >-->
			<!--<div v-for="file in portfolioFiles" class="column is-3" >-->
				<!--<h1 class="title is-1 has-text-centered">{{file.title}}</h1>-->
				<!--<img v-bind:src="file.image">-->
			<!--</div>-->
		<!--</div>-->
		<gallery :id="'blueimp-gallery-' + id" :images="images" :index="index" @close="index = null"></gallery>
		<!--<div class="container">-->

			<!--<div class="columns is-centered is-multiline" >-->
				<div v-for="(image, imageIndex) in images" class="column is-3" >
					<div
					  class="image"
					  :key="imageIndex"
					  @click="index = imageIndex"
					  :style="{ backgroundImage: 'url(' + image + ')' }"
					></div>
				</div>
			<!--</div>-->
		<!--</div>-->


	</div>
</template>

<script>

	export default {

		props: ['id'],
		data(){
			return {
				//selected:	null,
				portfolioFiles:	[],
				images:	[],
				index:	null
			};
		},
		created(){
			axios.get('/api/portfolio/' + this.id).then( response => {
				this.portfolioFiles = response.data;
				this.images = this.portfolioFiles.map(function(model){
					return model.image_url;
				});
			});
		},
		mounted(){
			this.selected = this.$route.params.id == this.id;
		},

	};
</script>