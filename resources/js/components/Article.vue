<template>
    <div style="flex-flow: nowrap" class="relative flex w-full max-w-[68rem] flex-row rounded-xl bg-white bg-clip-border text-gray-700 shadow-md">
        <div class="relative m-0 w-2/5 shrink-0 overflow-hidden rounded-xl rounded-r-none bg-white bg-clip-border text-gray-700">
            <img
                :src="article.urlToImage"
                alt="image"
                class="h-full w-full object-cover"
            />
        </div>
        <div class="p-6">
            <h6 class="mb-4 block font-sans text-base font-semibold uppercase leading-relaxed tracking-normal text-pink-500 antialiased">
                {{article.source.name}}
            </h6>
            <p class="author-title"> {{article.author}} - {{formatedDate(article.publishedAt)}} </p>
            <h4 class="mb-2 mt-3 block font-sans text-2xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                {{article.title}}
            </h4>
           <p class="mb-8 mt-4 block font-sans text-base font-normal leading-relaxed text-gray-700 antialiased">
                {{article.description}}
            </p>
            <a class="inline-block" :href="article.url" target="_blank">
                <button
                    @click="storeArticle(article)"
                    class="flex select-none items-center gap-2 rounded-lg py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-pink-500 transition-all hover:bg-pink-500/10 active:bg-pink-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                    type="button"
                >
                    Learn More
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        aria-hidden="true"
                        class="h-4 w-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                        ></path>
                    </svg>
                </button>
            </a>
        </div>
    </div>
</template>
<script>
import {storeArticle} from "../services/news.js";

export default {
    name: 'Article',
    data() {
        return {
        }
    },
    methods: {
        formatedDate(published_at) {
            let date = new Date(published_at);
            return date.toLocaleDateString();
        },
        storeArticle(article) {
            let data = {
                title: article.title,
                url: article.url,
                url_image: article.urlToImage,
            }
            storeArticle(data).then((response) => {
               console.log('Article stored', response)
            }).catch((error) => {
                console.log(error);
            });
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

.author-title {
    color: black;
    font-size: 12px;
}



</style>
