const request = require('request');

request(
  {
    url: 'https://api.twitch.tv/helix/games/top',
    headers: {
      'Client-ID': 'cht4rbpb659n4ystrmk3k6dwy08h66',
    },
  },
  (error, response, body) => {
    const json = JSON.parse(body);
    for (let i = 0; i < json.data.length; i += 1) {
      console.log(json.data[i].id, json.data[i].name);
    }
  },
);
