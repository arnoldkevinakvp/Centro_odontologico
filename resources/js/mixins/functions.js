export const exchangeRate = {
    methods: {
        async searchExchangeRateByDate(exchange_rate_date) {
            let response = await this.$http.get(`/services/exchange_rate/${exchange_rate_date}`)
            return parseFloat(response.data.sale)
        }
    }
};