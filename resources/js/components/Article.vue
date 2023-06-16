<template>
    <div class="card">
        <div >
            <img  class="card-image" :src="article.urlToImage" style="max-width: 100%;" alt="Image">
        </div>
        <p class="card-title">
            <a :href="article.url" target="_blank">{{article.title}}</a>
        </p>
        <p class="author-title"> {{article.author}} - {{formatedDate(article.publishedAt)}} </p>
        <p class="card-body">
            {{article.description}}
        </p>

    </div>
</template>
<script>
export default {
    name: 'Article',
    data() {
        return {
            articles: []
        }
    },
    methods: {
        formatedDate(published_at) {
            let date = new Date(published_at);
            return date.toLocaleDateString();
        }
    },
    props: {
        article: {
            type: Object,
            required: true
        }
    },
}
</script>
<style>
.card {
    padding: 20px;
    width: 330px;
    min-height: 430px;
    border-radius: 20px;
    background: #ffffff;
    box-shadow: 5px 5px 6px #dadada,
    -5px -5px 6px #f6f6f6;
    transition: 0.4s;
}

.card:hover {
    translate: 0 -10px;
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    color: #2e54a7;
    margin: 15px 0 0 10px;
}

.author-title {
    color: black;
    margin: 15px 0 0 10px;
    font-size: 12px;
}

.card-image {
    min-height: 170px;
    background-color: #c9c9c9;
    border-radius: 15px;
    box-shadow: inset 8px 8px 10px #c3c3c3,
    inset -8px -8px 10px #cfcfcf;
}

.card-body {
    margin: 13px 0 0 10px;
    color: rgb(31, 31, 31);
    font-size: 15px;
}

.footer {
    float: right;
    margin: 28px 0 0 18px;
    font-size: 13px;
    color: #636363;
}

.by-name {
    font-weight: 700;
}

</style>
