var MongoClient = require('mongodb').MongoClient;

MongoClient.connect("mongodb://localhost:27017/test", function (err, db) {
// Get the collection

    var database = db.db('test');

    var col = database.collection('test');

    var batch = col.initializeOrderedBulkOp();

    for (i = 0; i < 1000000; i++) {
        record = {'i': i};
        batch.insert(record);
    }

    batch.execute(function (err, result) {
        console.dir(err);
        console.dir(result);
        db.close();
    });
});