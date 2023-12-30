const mysql = require('mysql');
const request = require('request');
const cheerio = require('cheerio');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'scraper'
});

connection.connect((err) => {
  if (err) throw err;
  console.log('Connected to MySQL database!');

  const url = 'http://books.toscrape.com/';

  request(url, (error, response, html) => {
    if (!error && response.statusCode === 200) {
      const $ = cheerio.load(html);

      const results = $('article') // Assuming products are within article elements
        .map((index, element) => {
          const title = $(element).find('h3').text().trim();
          const price = $(element).find('.price_color').text().trim().substring(0, 10);
          return { title, price };
        });

      for (const result of results) {
        const query = 'INSERT INTO datascraped (title, price) VALUES (?, ?)';
        connection.query(query, [result.title, result.price], (err, result) => {
          if (err) throw err;
          // Handle success or errors within the loop
        });
      }

      connection.end(); // Close connection after processing all results
    } else {
      console.error('Error fetching page:', error);
      connection.end(); // Close connection on error
    }
  });
});