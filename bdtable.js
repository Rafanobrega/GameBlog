const { Client } = require('pg');

const client = new Client({
  host: "localhost",
  user: "rafaelnbg",
  password: "071920",
  database: "GameBlog"
});

client.connect(err => {
  if (err) {
    throw err;
  } else {
    console.log("Connected!");
    const sql = `
      CREATE TABLE usuarios (
        id SERIAL PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        author VARCHAR(100),
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
      )
    `;
    client.query(sql, (err, result) => {
      if (err) {
        throw err;
      } else {
        console.log("Table 'posts' created");
        client.end(); // Encerra a conexão após a criação da tabela
      }
    });
  }
});
