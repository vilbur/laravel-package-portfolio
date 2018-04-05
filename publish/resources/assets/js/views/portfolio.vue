<template>
	<div id="vilbur-portfolio">
		
		<ul class="tabs is-centered is-fixed-top" style="margin-top:180px">
			<!--<ul>-->
				<li><a @click.prevent="filtered=''">All</a></li>
				<li v-for="category in categories">
					<a @click.prevent="filtered=category.slug">{{ category.slug }}</a>
				</li>
			<!--</ul>-->
		</ul> 

		<!--<h1 class="title is-1 has-text-centered">-->
			<!--<router-link to="/portfolio/all" @click.native="showAll()">Expand All</router-link>-->
		<!--</h1>-->
		<div v-for="portfolio in filteredPortfolios" class="portfolio hero" :id="'hero-'+portfolio.slug"  :portfolio="portfolio">
			<div class="hero-body">
				<div class="container">

					<router-link
						:to="{ path: '/portfolio/' + portfolio.slug }"
						:class="{ visible: isVisible(portfolio.slug) }"
						@click.native="toggle(portfolio.slug)"
					>
						<div class="portfolio-background" :style="{ backgroundImage: 'url(' +  portfolio.image_url + ')' }">
							<h2 class="title is-1 ">{{ portfolio.title }}</h2>
						</div>
					</router-link>
					
					<div class="hero-foot">
						<div class="container">
							
							<keep-alive>
								<transition name="show">
									<portfolio-item
										:portfolio_slug="portfolio.slug"
										v-if="isFetched(portfolio.slug)"
										v-show="isVisible(portfolio.slug)"
									></portfolio-item>
								</transition>
							</keep-alive>

						</div>
					</div>

				</div>
			</div>
		</div>

	</div>

</template>

<style>

	.show-enter,
	.show-leave-to { max-height: 1px; opacity: 0  }

	.show-leave,
	.show-enter-to { max-height: 4096px; opacity: 1  }

	.show-enter-active,
	.show-leave-active { transition: 600ms ease-out}

	/*.show-enter-active { transition:  500ms }*/
	/*.show-leave-active { transition:  1500ms }*/
</style>


<script>
	import portfolioItem from '../components/portfolio-item';
	import VueScrollTo from 'vue-scrollto';

	export default {

		data(){
			return {
				categories:	[],
				portfolios:	[],
				visible:	{},
				//visible:	[],
				isFiltered:	'all',
				//filtered:	'',
				filtered:	'Dolore-asperiores',			
			}; 
		},
		created(){
			//this.show( this.$route.params.portfolio_slug );
			//axios.get('/db/category-portfolio').then( response => this.categories = [].concat.apply([{slug:'all'}], response.data) );
			axios.get('/db/category-portfolio').then( response => this.categories = response.data );			
			axios.get('/db/portfolio').then( response => this.portfolios = response.data );
		},
		methods:{
			
			filterCatergory(category){ 
				this.isFiltered = category;
			},
			
			show(portfolio_slug)
			{
				this.$set(this.visible, portfolio_slug, true);
			},
			hide(portfolio_slug)
			{
				this.$set(this.visible, portfolio_slug, false);
			},
			showAll()
			{
				for(var p=0; p<this.portfolios.length;p++)
					this.show(this.portfolios[p].slug);
			},
			toggle(portfolio_slug)
			{
				if( ! this.isVisible(portfolio_slug))
					this.scrollToItem(portfolio_slug);
					
				this.$set(this.visible, portfolio_slug, (! this.visible[portfolio_slug]));
			},
			isFetched(portfolio_slug)
			{
				return this.visible.hasOwnProperty(portfolio_slug);
			},
			isVisible(portfolio_slug)
			{
				if( this.isFetched(portfolio_slug) )
					return this.visible[portfolio_slug];
			},
			scrollToItem(portfolio_slug){
				setTimeout( function(){
					VueScrollTo.scrollTo( "#hero-"+portfolio_slug, 500, { easing: 'ease-in', offset: -20});
				}, 500);
			}
		},
		
		computed: {
			filteredPortfolios: function () {
				var self = this;
				return self.portfolios.filter(function (portfolio) {
					return portfolio.category == self.filtered || ! self.filtered
				})
			}
		},
		watch: {
		  filtered(){}
		},
		
		components:{
			'portfolio-item':	portfolioItem,
		}
	};
</script>
