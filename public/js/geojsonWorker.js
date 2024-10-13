self.onmessage = function (e) {
    const { url, provinsi } = e.data;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            self.postMessage({ provinsi, data });
        })
        .catch(error => {
            self.postMessage({ provinsi, error: 'Failed to load data for ' + provinsi });
        });
};