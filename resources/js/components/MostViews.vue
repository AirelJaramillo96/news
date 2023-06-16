<template>
    <div class="mt-10 relative flex w-96 flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="relative mx-4 -mt-6 h-56 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
            <img
               alt="img-blur-shadow"
               class="relative  h-56 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40"
                :src="article.url_image"
                layout="fill"
            />
        </div>
        <div class="p-6">
            <h5 class="mb-2 block font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                {{article.title}}
            </h5>
        </div>
        <div class="p-6 pt-0">
            <button
                @click="goToArticle(article)"
                class="select-none rounded-lg bg-pink-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="button"
                data-ripple-light="true"
            >
                Read More
            </button>
        </div>
    </div>
</template>
<script>
import {storeArticle} from "../services/news.js";

export default {
    name: 'MostViews',
    data() {
        return {
        }
    },
    props: {
        article: {
            type: Object,
            required: true
        }
    },
    methods: {
        goToArticle(article) {
            window.open(article.url, '_blank');
            let data = {
                title: article.title,
                url: article.url,
                url_image: article.url_image,
            }
            storeArticle(data).then((response) => {
                console.log('Article stored', response)
            }).catch((error) => {
                console.log(error);
            });
        }
    },

}
</script>
