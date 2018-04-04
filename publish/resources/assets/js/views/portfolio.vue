<template>
	<div id="vilbur-portfolio">

		<h1 class="title is-1 has-text-centered">
			<router-link to="/portfolio/all" @click.native="showAll()">ALL</router-link>
		</h1>

		<div v-for="(portfolio, index) in portfolios" class="portfolio hero" :id="'hero-'+portfolio.slug"  :portfolio="portfolio">
			<div class="hero-body">
				<div class="container">

					<router-link
						:to="{ path: '/portfolio/' + portfolio.slug }"
						:class="{ shown: isShown(portfolio.slug) }"
						@click.native="toggle(portfolio.slug)"
					>
						<div class="portfolio-background" :style="{ backgroundImage: 'url(' +  portfolio.image_url + ')' }">
							<h2 class="title is-1 ">{{ portfolio.title }}</h2>
						</div>
					</router-link>
					<div class="hero-foot">
						<div class="container">

							<transition name="show">
								<portfolio-item
									:portfolio_slug="portfolio.slug"
									v-if="isFetched(portfolio.slug)"
									v-show="isShown(portfolio.slug)"
								></portfolio-item>
							</transition>

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
	import portfolioItem	from '../components/portfolio-item';
	import VueScrollTo	from 'vue-scrollto';

	export default {

		data(){
			return {
				portfolios:	[],
				fetched:	[],
				shown:	[],
			};
		},
		created(){
			this.show( this.$route.params.portfolio_slug );
			axios.get('/db/portfolio').then( response => this.portfolios = response.data );
		},
		methods:{

			fetchPorfolioItem(portfolio_slug)
			{
				if( ! this.isFetched(portfolio_slug))
					this.fetched.push(portfolio_slug);
			},

			show(portfolio_slug)
			{
				this.fetchPorfolioItem(portfolio_slug);
				if( ! this.isShown(portfolio_slug))
					this.shown.push(portfolio_slug);
			},

			hide(portfolio_slug)
			{
				this.shown.splice(this.shown.indexOf(portfolio_slug), 1);
			},
			showAll()
			{
				for(var p=0; p<this.portfolios.length;p++)
					this.show(this.portfolios[p].slug);
			},

			toggle(portfolio_slug)
			{
				this.fetchPorfolioItem(portfolio_slug);

				if( ! this.isShown(portfolio_slug)){
					this.show(portfolio_slug);
					this.scrollToItem(portfolio_slug);
				} else
					this.hide(portfolio_slug);
			},

			isFetched(portfolio_slug)
			{
				return this.fetched.indexOf(portfolio_slug) > -1;
			},

			isShown(portfolio_slug)
			{
				return this.shown.indexOf(portfolio_slug) > -1;
			},

			scrollToItem(portfolio_slug){
				setTimeout( function(){
					VueScrollTo.scrollTo( "#hero-"+portfolio_slug, 500, { easing: 'ease-in', offset: -20});
				}, 1000);
			}

		},

		components:{
			'portfolio-item':	portfolioItem,
		}
	};
</script>
