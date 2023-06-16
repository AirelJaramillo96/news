<template>
    <Header @search="searchNews" @search-by-query="searchByQuery"></Header>
    <div class="news lg:ml-40 sm:ml-0 md:ml-0 lg:mr-40 sm:mr-0 md:mr-0">
        <div class="flex w-full">
            <div class="lg:w-2/3 sm:w-full md:w-full">
                <h1 class="text-3xl font-black font-normal">
                    <span>Principal News</span>
                </h1>
                <template v-for="(article, idx) in articles">
                    <div class="mt-5">
                        <Article :article="article"></Article>
                    </div>
                </template>
            </div>
            <div class="lg:w-1/3 sm:w-full md:w-full ml-8">
                <h1 class="text-3xl font-black font-normal">
                    <span>More Views</span>
                </h1>
                <template v-for="(article, idx) in most_viewed">
                    <div class="mt-8 mb-8">
                        <MostViews :article="article"></MostViews>
                    </div>
                </template>
            </div>
        </div>
    </div>
</template>
<script>
import {getMostViewedArticles, getNews} from "./services/news.js";
import Article from "./components/Article.vue";
import Header from "./components/Header.vue";
import MostViews from "./components/MostViews.vue";
export default {
    name: 'App',
    data() {
        return {
            articles: [],
            most_viewed: [],
            params: {
                category: 'general',
                q: ''
            }
        }
    },
    components: {
        Article,
        Header,
        MostViews
    },
    mounted() {
        this.params.category = 'general';
        getNews(this.params).then(response => {
            this.articles = response.articles;
        });
        getMostViewedArticles().then(response => {
            this.most_viewed = response;
        });
    },
    methods: {
        searchNews(category) {
            console.log('searching...', category)
            this.params.category = category;
            getNews(this.params).then(response => {
                this.articles = response.articles;
            });
        },
        searchByQuery(query) {
            console.log(query)
            console.log('searching...', query)
            this.params.q = query;
            getNews(this.params).then(response => {
                this.articles = response.articles;
            });
        }
    }
}
</script>
<style>
.news {
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    color: #2c3e50;
    margin: 1rem;
}
.position {
    display: inline;
}
.article-container {
    flex-basis: calc(25% - 1rem);
    margin-bottom: 1rem;
}

/* Media queries para hacerlo responsivo */
@media (max-width: 1200px) {
    .article-container {
        flex-basis: calc(33.33% - 1rem);
    }
}

@media (max-width: 992px) {
    .article-container {
        flex-basis: calc(50% - 1rem);
    }
}

@media (max-width: 576px) {
    .article-container {
        flex-basis: calc(100% - 1rem);
    }
}
</style>
