const request = require('request');
const process = require('process');

if (process.argv[2] === 'update') {
  request.patch(
    {
      url: `https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`,
      form: {
        name: process.argv[4],
      },
    },
  );
} else if (process.argv[2] === 'delete') {
  request.delete(`https://lidemy-book-store.herokuapp.com/books/${process.argv[3]}`);
} else if (process.argv[2] === 'create') {
  request.post(
    {
      url: 'https://lidemy-book-store.herokuapp.com/books',
      form: {
        name: process.argv[3],
      },
    },
  );
} else {
  request(
    'https://lidemy-book-store.herokuapp.com/books',
    (error, response, body) => {
      const json = JSON.parse(body);
      if (process.argv[2] === 'list') {
        for (let i = 0; i < 20; i += 1) {
          console.log(json[i].id, json[i].name);
        }
      } else if (process.argv[2] === 'read') {
        console.log(json[(process.argv[3] - 1)].id, json[(process.argv[3] - 1)].name);
      }
    },
  );
}
