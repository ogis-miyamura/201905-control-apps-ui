var express = require('express');
var router = express.Router();

/* GET users listing. */
router.get('/:tableName', function(req, res, next) {

  let pgp = require('pg-promise')(/* options */)
  let connection = {
      host: 'db',
      database: 'control-apps-ui',
      user: 'postgres',
      password: 'p@ssw0rd',
  };

  let db = pgp(connection);

  let sql = `SELECT * from ${req.params.tableName}`;
  console.log(`sql: ${sql}`);

  db.any(sql)
    .then((data) => {
      let resultText = JSON.stringify(data, null, '  ');
      console.log(`data: ${resultText}`);
      res.send(`<pre>sql: ${sql}\n\nresultText: ${resultText}</pre>`);
    })
    .catch((error) => {
      console.log('ERROR:', error)
    });

});

module.exports = router;
