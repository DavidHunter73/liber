const axios = require('axios');

// set up the request parameters
const params = {
  api_key: "0598BEE3A9334E7A8E2DE57AAFE2E0D8",
  amazon_domain: "amazon.com",
  type: "search",
  search_term: "harry potter"
}

// make the http GET request to Rainforest API
axios.get('https://api.rainforestapi.com/request', { params })
  .then(response => {

    // print the JSON response from Rainforest API
    console.log(JSON.stringify(response.data, 0, 2));

  }).catch(error => {
    // catch and print the error
    console.log(error);
  });
