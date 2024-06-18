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
      INSERT INTO usuarios (login, senha) VALUES
      ('rafanbg', '01020304'),
      ('lucamourao', '02030405')
    `;
    client.query(sql, (err, result) => {
      if (err) {
        throw err;
      } else {
        console.log("Records inserted");
        client.end(); // Encerra a conexão após a inserção dos registros
      }
    });
  }
});
