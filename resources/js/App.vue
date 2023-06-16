<template>
    <Header @search="searchNews" @search-by-query="searchByQuery"></Header>
    <div class="news">
        <div class="flex">
            <template v-for="(article, idx) in articles">
                <div class="article-container">
                    <Article :article="article"></Article>
                </div>
            </template>
        </div>
    </div>
</template>
<script>
import {getNews} from "./services/news.js";
import Article from "./components/Article.vue";
import Header from "./components/Header.vue";
export default {
    name: 'App',
    data() {
        return {
            articles: [],
            params: {
                category: 'general',
                q: ''
            }
        }
    },
    components: {
        Article,
        Header
    },
    mounted() {
        this.params.category = 'general';
        getNews(this.params).then(response => {
            this.articles = response.articles;
        });
        console.log('Component mounted.')
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
.flex {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
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
