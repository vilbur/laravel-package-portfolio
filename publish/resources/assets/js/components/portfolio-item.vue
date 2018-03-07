<template>
	<div id="portfolio-item" class="columns is-centered is-multiline" >

		<gallery :id="'blueimp-gallery-' + portfolio_slug" :images="galleryImages" :index="index" @close="index = null" :options="{youTubeVideoIdProperty: 'video', youTubePlayerVars: {rel:0}, youTubeClickToPlay: false}"></gallery>
		<div v-for="item in portfolioItems" class="column is-12 border-OFF-g" >

			<div class="portfolio-item columns">
				<div v-if="hasText(item)" class="column is-4">
					<h3 v-if="item.title" class="title is-3">{{ item.title }}</h3>
					<h4 v-if="item.summary" class="subtitle is-4">{{ item.summary }}</h4>
					<div v-if="item.description" v-html="item.description"></div>
				</div>

				<div class="column is-8">
					<portfolio-file
								   v-on:imagesPrepared="addGalleryImages"
								   v-on:imageClicked="openGallery"
								   :portfolio_item_id="item.id"
					></portfolio-file>
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
				portfolioItems:	[],
				galleryImages:	[],
				index:	null
			};
		},
		methods:{
			hasText(item){
				return !item.title && !item.summary && !item.description ? false : true;
			},
			addGalleryImages(images){
				this.galleryImages	= [].concat.apply( this.galleryImages, images);
			},
			openGallery(index){
				this.index = index;
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
