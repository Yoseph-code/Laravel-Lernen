const axios = window.axios;

const BASE_API_URL = 'http://products.test/api'

export default {
    getAllProducts: () => 
        axios.get(`${BASE_API_URL}/products`), 
    getOneProduct: (id) => 
        axios.get(`${BASE_API_URL}/products/${id}/edit`),
    addProducts: (product) => 
        axios.post(`${BASE_API_URL}/products`, product), 
    updateProducts: (product, id) => 
        axios.put(`${BASE_API_URL}/products/${id}`, product),
    deleteProducts: (id) => 
        axios.delete(`${BASE_API_URL}/products/${id}`),
}