import React from 'react'
import { gql } from 'apollo-boost';
import { useQuery } from '@apollo/react-hooks';


const EXCHANGE_RATES = gql`
  {
    rates(currency: "USD") {
      currency
      rate
      name
    }
  }
`;


const Book = () => {
    return (
        <div className="container">
            <div>
                <h2>My first Apollo app 🚀</h2>
                <ExchangeRates />
            </div>
        </div>
    )
    function ExchangeRates() {
        const { loading, error, data } = useQuery(EXCHANGE_RATES);

        if (loading) return <p>Loading...</p>;
        if (error) return <p>Error :(</p>;

        return data.rates.map(({ currency, rate, name }) => (
            <div key={currency}>
                <p>
                    {currency}: {rate} : {name}
                </p>
            </div>
        ));
    }
}





export default Book