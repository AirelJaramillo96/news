export function getNews(params) {
    return new Promise((resolve, reject) => {
        axios.get(`news`, { params })
            .then((response) => {
                resolve(response.data);
            })
            .catch((error) => {
                reject(error);
            });
    });
}


export function storeArticle(data) {
    return new Promise((resolve, reject) => {
        axios.post(`article/store`, data)
            .then((response) => {
                resolve(response.data);
            })
            .catch((error) => {
                reject(error);
            });
    });
}


export function getMostViewedArticles() {
    return new Promise((resolve, reject) => {
        axios.get(`article/most_viewed`)
            .then((response) => {
                resolve(response.data);
            })
            .catch((error) => {
                reject(error);
            });
    });
}
