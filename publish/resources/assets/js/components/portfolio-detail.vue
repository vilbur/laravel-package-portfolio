<template>
	<div class="columns is-centered is-multiline" >
		<gallery :id="'blueimp-gallery-' + slug" :images="images" :index="index" @close="index = null"></gallery>

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
					//return model.image_url;

					return {
						title: 'Lorem ipsum luctus habitasse.',
						description: '<b>Lorem ipsum luctus habitasse</b><br> ac aenean donec ultrices maecenas arcu, risus primis sodales urna feugiat platea conubia volutpat duis nisl, eleifend netus dolor iaculis ante diam turpis.',
						href:  model.image_url,
					};
				});
			});
		},
		mounted(){
			this.selected = this.$route.params.slug == this.slug;
		},

	};
</script>