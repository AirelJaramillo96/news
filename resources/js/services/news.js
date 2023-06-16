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
